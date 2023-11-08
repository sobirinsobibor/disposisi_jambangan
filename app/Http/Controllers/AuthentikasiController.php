<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentikasiController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        $credentials = $request->validate([
            "nip" => 'required',
            "password" => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');

        }
        return back()->with('loginError', 'Gagal Masuk, Silahkan coba lagi!');
    }

    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
