<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Anggota_Keluarga;
use Illuminate\Http\Request;
use Session;


class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Warga";
        $navigation = "active";
        $dataWarga = Warga::all();
        return view('template.warga.index', compact('titlePage', 'navigation', 'dataWarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Tambah Warga";
        $navigation = "active";
        return view('template.warga.add', compact('titlePage', 'navigation'));
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
            'nama_warga' => 'required',
            'nik' => 'required|unique:wargas',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'status_perkawinan' => 'required',
            'no_kk' => 'required|unique:wargas',
            'akun' => 'required',
        ]);

        $post = Warga::create($request->all());

        Session::flash('success', 'Berhasil Menambah Warga');
        return redirect()->route('warga.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        $titlePage = "Detail Warga";
        $navigation = "active";
        $family = Anggota_Keluarga::where('wargas_id', $warga->id)->get();
        return view('template.warga.detail', compact('titlePage', 'navigation', 'warga', 'family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        $titlePage = "Edit Warga";
        $navigation = "active";
        return view('template.warga.edit', compact('titlePage', 'navigation', 'warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warga $warga)
    {
        $oldValue = Warga::find($warga->id);
        if ($oldValue->nik != $request->nik) {
            $validation = $request->validate([
                'nik' => 'required|unique:wargas',
            ]);
        } else if($oldValue->no_kk != $request->no_kk){
            $validation = $request->validate([
                'no_kk' => 'required|unique:wargas',
            ]);
        }
        
        $warga->update($request->all());
        Session::flash('success', 'Berhasil Mengedit Warga');
        return redirect()->route('warga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        //
    }

    public function family($id)
    {
        $titlePage = "Tambah Anggota Keluarga";
        $navigation = "active";
        $warga = Warga::find($id);

        return view('template.warga.family.add', compact('titlePage', 'navigation', 'warga'));
    }

    public function postFamily(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'wargas_id' => 'required',
            'nama_warga' => 'required',
            'nik' => 'required|unique:anggota_keluargas',
            'tanggal_lahir' => 'required',
            'status_hubungan' => 'required',
            'tempat_lahir' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
        ]);

        $family = new Anggota_Keluarga;
        $family->wargas_id = $request->wargas_id;
        $family->nama_warga = $request->nama_warga;
        $family->nik = $request->nik;
        $family->tanggal_lahir = $request->tanggal_lahir;
        $family->tempat_lahir = $request->tempat_lahir;
        $family->status_hubungan = $request->status_hubungan;
        $family->no_telp = $request->no_telp;
        $family->agama = $request->agama;
        $family->jenis_kelamin = $request->jenis_kelamin;
        $family->pekerjaan = $request->pekerjaan;

        $family->save();
        
        Session::flash('success', 'Berhasil Menambah Anggota Keluarga');
        return redirect()->route('warga.index');
    }
}
