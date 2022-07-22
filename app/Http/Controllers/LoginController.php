<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $titlePage = "Login";
        return view('auth.template.loginPage', compact('titlePage'));
    }

    public function forgot()
    {
        $titlePage = "Lupa Password";
        return view('auth.template.forgotPassword', compact('titlePage')); 
    }
}
