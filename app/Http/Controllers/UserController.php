<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Pengguna";
        $navigation = "active";
        $dataUser = User::where('id', '!=', Auth::user()->id)->get();
        return view('template.user.index', compact('titlePage', 'navigation', 'dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Tambah Pengguna";
        $navigation = "active";
        $dataWarga = Warga::where('akun', 'no')->get();
        $dataJabatan = Jabatan::all();
        return view('template.user.add', compact('titlePage', 'navigation', 'dataWarga', 'dataJabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'email' => 'unique:users',
        ]);

        $post = new User;

        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->jabatans_id = $request->jabatans_id;
        $post->wargas_id = $request->wargas_id;
        $post->status = "aktif";

        $post->save();

        $edit = Warga::where('id', $request->wargas_id)->firstOrFail();

        $edit->akun = "terdaftar";

        $edit->save();

        Session::flash('success', 'Berhasil Menambah Akun Pengguna');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $titlePage = "Edit Pengguna";
        $navigation = "active";
        $dataWarga = Warga::where('akun', 'terdaftar')->get();
        $dataJabatan = Jabatan::all();
        return view('template.user.edit', compact('titlePage', 'navigation', 'user', 'dataWarga', 'dataJabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = User::where('id', $id)->firstOrFail();

        if ($update->email != $request->email) {
            $validation = $request->validate([
                'email' => 'unique:users',
            ]);
        }

        $update->email = $request->email;
        $update->jabatans_id = $request->jabatans_id;
        $update->wargas_id = $request->wargas_id;
        $update->status = $request->status;

        $update->save();

        Session::flash('success', 'Berhasil Mengedit Akun Pengguna');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $getId = Warga::where('id', $user->wargas_id)->firstOrFail();

        $getId->akun = "no";
        $getId->save();

        $user->delete();

        Session::flash('success', 'Berhasil Menghapus Pengguna');
        return redirect()->route('users.index');
    }
}
