<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aduan;
use App\Models\Agenda;

class DashboardController extends Controller
{
    public function index()
    {
        $titlePage = 'Dashboard';
        $navigation = 'active';
        $totalAduan = Aduan::count();
        $aduan = Aduan::orderBy('created_at', 'desc')->limit(5)->get();
        $agenda = Agenda::where('status', '!=', 'arsip')->orderBy('created_at', 'desc')->limit(5)->get();
        return view('template.dashboard', compact('titlePage', 'navigation', 'totalAduan', 'aduan', 'agenda'));
    }
}
