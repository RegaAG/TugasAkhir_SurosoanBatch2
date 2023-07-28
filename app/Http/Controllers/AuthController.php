<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function authPage()
    {
        return view('Auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('info', 'Login Berhasil');
        }
 
        return back()->with('info', 'Username Atau Password Salah');
    }

    public function Logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
