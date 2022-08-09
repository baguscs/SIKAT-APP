<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Mail\ForgotMail;
use Session;
use Mail;

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

    public function send_mail(Request $request)
    {
        $checker = User::where('email', $request->email)->first();
        if ($checker != null) {
            $details = [
                'title' => 'Mail from SIKAT',
                'body' => 'Pesan Konfirmasi Lupa Password, Abaikan pesan ini jika anda tidak membutuhkannya',
                'id' => Crypt::encrypt($checker->id)
            ];

            Mail::to($request->email)->send(new ForgotMail($details));

            return redirect()->back()->with('pesan', 'Email Reset Password berhasil terkirim');
        } else{
            return redirect()->back()->with('gagal', 'Email tidak ditemukan');
        }
        
    }

    public function form_forgot($id)
    {
        $parameter = Crypt::decrypt($id);
        return view('auth.template.reset', compact('parameter'));
    }

    public function execute_forgot(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);

        $find = User::find($id);
        $find->update([
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->back()->with('pesan', 'Password Berhasil di reset silahkan login');
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

    public function unauthorizaed()
    {
        return view('template.error.user_off');
    }
}
