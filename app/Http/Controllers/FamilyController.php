<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Anggota_Keluarga;
use Illuminate\Http\Request;
use Session;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Anggota_Keluarga $family)
    {
        $titlePage = "Edit Anggota Keluarga";
        $navigation = "active";
        $dataWarga = Warga::all();
        return view('template.warga.family.edit', compact('titlePage', 'navigation', 'family', 'dataWarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota_Keluarga $family)
    {
        $oldValue = Anggota_Keluarga::find($family->id);
        if ($oldValue->nik != $request->nik) {
            $validation = $request->validate([
                'nik' => 'required|unique:anggota_keluargas',
            ]);
        }

        $family->update($request->all());
        Session::flash('success', 'Berhasil Mengedit Anggota Keluarga');
        return redirect()->route('warga.show', $family->wargas_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota_Keluarga $family)
    {
        $getParent = $family->wargas_id;

        $family->delete();

        Session::flash('success', 'Berhasil Menghapus Keluarga');
        return redirect()->route('warga.show', $getParent);
    }
}
