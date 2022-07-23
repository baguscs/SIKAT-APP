<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $titlePage = 'Dashboard';
        $navigation = 'active';
        return view('template.dashboard', compact('titlePage', 'navigation'));
    }
}
