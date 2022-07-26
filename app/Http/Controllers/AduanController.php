<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Image;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Aduan";
        $navigation = "active";
        $dataAduan = Aduan::all(); 
        return view('template.aduan.index', compact('titlePage', 'navigation', 'dataAduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Tambah Aduan";
        $navigation = "active";
        return view('template.aduan.add', compact('titlePage', 'navigation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bukti' => 'required|image|mimes:jpg,png,jpeg|max:1000',
        ]);

        if($request->hasfile('bukti'))
        {
            $file = $request->file('bukti');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/aduan/', $filename);
        }

        DB::table('aduans')->insert([
            'users_id' => $request->users_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'bukti' => $filename,
            'status' => 'ditinjau'
        ]);

        Session::flash('success', 'Berhasil Menambah Aduan');
        return redirect()->route('aduan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function show(Aduan $aduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Aduan $aduan)
    {
        $titlePage = "Edit Agenda";
        $navigation = "active";
        return view('template.aduan.edit', compact('aduan', 'titlePage', 'navigation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aduan $aduan)
    {
        $validatedData = $request->validate([
            'bukti' => 'image|mimes:jpg,png,jpeg|max:1000',
        ]);

        $oldFile = Aduan::where('id', $aduan->id)->value('bukti');

        if($request->hasfile('bukti'))
        {
            $file = $request->file('bukti');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/aduan/', $filename);
            $destroy = public_path().'\\storage\\aduan\\'. $oldFile;
            unlink($destroy);

            DB::table('aduans')->update([
                'users_id' => $request->users_id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'bukti' => $filename,
                'status' => 'ditinjau'
            ]);
        }

        else{
            DB::table('aduans')->update([
                'users_id' => $request->users_id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'status' => 'ditinjau'
            ]);
        }

        Session::flash('success', 'Berhasil Mengedit Aduan');
        return redirect()->route('aduan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aduan $aduan)
    {
        
    }
}
