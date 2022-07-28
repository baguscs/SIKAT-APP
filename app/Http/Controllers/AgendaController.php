<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlePage = "Agenda";
        $navigation = "active";
        if (Auth::user()->jabatan->nama_jabatan == 'Super Admin') {
            $dataAgenda = Agenda::all();
        } else {
            $dataAgenda = Agenda::where('status', '!=', 'arsip')->get();
        }
        
        return view('template.agenda.index', compact('titlePage', 'navigation', 'dataAgenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titlePage = "Tambah Agenda";
        $navigation = "active";
        return view ('template.agenda.add', compact('titlePage', 'navigation'));
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
            'users_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'status' => 'required',
        ]);

        $new = Agenda::create($request->all());

        Session::flash('success', 'Berhasil Menambah Agenda');
        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        $titlePage = "Edit Agenda";
        $navigation = "active";
        return view('template.agenda.detail', compact('agenda', 'titlePage', 'navigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $titlePage = "Edit Agenda";
        $navigation = "active";
        return view('template.agenda.edit', compact('agenda', 'titlePage', 'navigation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validation = $request->validate([
            'users_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tempat' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'status' => 'required',
        ]);

        $agenda->update($request->all());

        Session::flash('success', 'Berhasil Mengedit Agenda');
        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        Session::flash('success', 'Berhasil Menghapus Agenda');
        return redirect()->route('agenda.index');
    }
}
