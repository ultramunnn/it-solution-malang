<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function tampilkanLogin()
    {
        return view('pages.auth.01-login');
    }

    //fungsi login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email salah.',
            'password' => 'Password salah.',
        ])->onlyInput('email', 'password');

    }

    public function tampilkanRegister()
    {
        return view("pages.auth.02-register");
    }

    //fungsi register
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15|unique:users,phone',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=> $request->phone,
            'role' => 'customer',
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');

    }

    //fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('pages.auth.01-login')->with('success', 'Logout berhasil!');
    }



    public function tampilkanLupaPassword()
    {
        return view("pages.auth.03-lupapassword");
    }
    public function tampilkanUpdatePassword()
    {
        return view("pages.auth.04-updatepassword");
    }


}
