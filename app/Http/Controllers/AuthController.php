<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $titlePage = "Login";
        return view('auth.login', compact('titlePage'));
    }

    public function forgot()
    {
        $titlePage = "Lupa Password";
        return view('auth.template.forgotPassword', compact('titlePage')); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        
        return redirect()->route('landingPage');
    }
}
