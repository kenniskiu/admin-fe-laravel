<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        try {
            return view('auth.login');
        } catch (\Throwable $th) {
            // return redirect('/')->with('toast_error',  'Halaman tidak dapat di akses! ');
        }
    }

    public function auth(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()
                ->intended('/admin');
        } else {
            return redirect()
                ->back()
                ->with('toast_error',  "Email/Password Salah!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
