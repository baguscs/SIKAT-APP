<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->jabatan->nama_jabatan == 'Super Admin' || Auth::user()->jabatan->nama_jabatan == 'Admin') {
            $dataAduan = Aduan::all(); 
        } 
        else {
            $dataAduan = Aduan::where('status', '!=', 'ditolak')->get(); 
        }
        
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
            'status' => 'ditinjau',
            'created_at' => date('Y-m-d H:i:s')
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
        $titlePage = "Detail Aduan";
        $navigation = "active";
        $tanggapan = Tanggapan::where('aduans_id', $aduan->id)->get();
        return view('template.aduan.detail', compact('aduan', 'titlePage', 'navigation', 'tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Aduan $aduan)
    {
        $titlePage = "Edit Aduan";
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

            DB::table('aduans')->where('id', $aduan->id)
            ->update([
                'users_id' => $request->users_id,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'bukti' => $filename,
                'status' => 'ditinjau'
            ]);
        }

        else{
            DB::table('aduans')->where('id', $aduan->id)
            ->update([
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

    public function review($id)
    {
        $titlePage = "Review Agenda";
        $navigation = "active";
        $aduan = Aduan::find($id);
        return view('template.aduan.review', compact('titlePage', 'navigation', 'aduan'));
    }

    public function respond(Request $request)
    {
        if ($request->has('tanggapi')) {
            $validatedData = $request->validate([
                'bukti' => 'image|mimes:jpg,png,jpeg|max:1000',
            ]);

            $file = $request->file('bukti');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/tanggapan/', $filename);

            DB::table('tanggapans')->insert([
                'aduans_id' => $request->aduans_id,
                'users_id' => $request->users_id,
                'isi' => $request->isi,
                'bukti' => $filename
            ]);

            DB::table('aduans')->where('id', $request->id)->update([
                'status' => 'ditanggapi'
            ]);
            
        } else {
            if ($request->radio_review == 'ya') {
                DB::table('aduans')->where('id', $request->id)->update([
                    'status' => 'diterima'
                ]);
            } else {
                DB::table('aduans')->where('id', $request->id)->update([
                    'status' => 'ditolak'
                ]);
            }
        }
        
        Session::flash('success', 'Berhasil Mereview Aduan');
        return redirect()->route('aduan.index');
    }

    public function mypost()
    {
        $titlePage = "Aduan Ku";
        $navigation = "active";
        $dataAduan = Aduan::where('users_id', Auth::user()->id)->get();
        return view('template.aduan.mypost', compact('titlePage', 'navigation', 'dataAduan'));
    }
}
