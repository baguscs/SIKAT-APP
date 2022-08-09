<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aduan;
use App\Models\Agenda;
use App\Models\Dana;
use App\Models\Warga;
use App\Models\Anggota_Keluarga;

class DashboardController extends Controller
{
    public function index()
    {
        $titlePage = 'Dashboard';
        $navigation = 'active';
        $totalAduan = Aduan::count();
        $aduan = Aduan::orderBy('created_at', 'desc')->limit(5)->get();
        $agenda = Agenda::where('status', '!=', 'arsip')->orderBy('created_at', 'desc')->limit(5)->get();
        $income = Dana::where('kategori', 'Pemasukan')->get();
        $inflow = 0;
        foreach ($income as $value) {
            $inflow += $value->total;
        }

        $spending = Dana::where('kategori', 'Pengeluaran')->get();
        $outlay = 0;
        foreach ($spending as $item) {
            $outlay += $item->total;
        }
        $warga = Warga::all()->count();
        $family = Anggota_Keluarga::all()->count();
        $totalWarga = $warga + $family;
        return view('template.dashboard', compact('titlePage', 'navigation', 'totalAduan', 'aduan', 'agenda', 'inflow', 'outlay', 'totalWarga'));
    }
}
