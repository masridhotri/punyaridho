<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.Login');
    }

    public function login_proses(Request $request)
    {
     $request->validate([
        'email' => 'required',
        'password' => 'required'
     ]);
     $data = [
        'email' => $request->email,
        'password' => $request->password 
    ];
 
    if(Auth::attempt($data)){
        return redirect()->route('admin.dashboard');
    }else{
        return redirect()->route('login')->with('error', 'Login Gagal');
    };
    }

    public function logout()
    {
         Auth::logout();
         return redirect()->route('login')->with('success', 'Logout Berhasil');
        
    }
    public function register()
    {
        return view('auth.register');
    }
}
