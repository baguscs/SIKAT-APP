<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
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

    public function reset()
    {
        $titlePage = "Ubah Password";
        return view('template.akun.reset_password', compact('titlePage')); 
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $find = User::find(Auth::user()->id);
        $checker = Hash::check($request->input('old_password'), $find->password);

        if ($checker) {
            $find->update([
                'password' => Hash::make($request->input('password')),
            ]);

            Session::flash('success', 'Berhasil Merubah Password');
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('pesan', 'Maaf Password Lama yang anda masukkan salah');
        }
    }
}
