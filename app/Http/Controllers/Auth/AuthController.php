<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;

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

        $user = User::where('email', 'like', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email yang Anda masukkan tidak terdaftar.',
            ])->onlyInput('email');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password yang Anda masukkan salah.',
            ])->onlyInput('email'); 
        }

        Auth::login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
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
            'phone' => $request->phone,
            'role' => 'customer',
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    //fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Clear all cache and redirect to home/landing page
        return redirect()->route('home')
            ->with('success', 'Logout berhasil!')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }


    //fungsi luapa password
    public function tampilkanLupaPassword()
    {
        return view("pages.auth.03-lupapassword");
    }
    public function tampilkanUpdatePassword()
    {
        return view("pages.auth.04-updatepassword");
    }

    //fungsi kirim link reset password
    public function kirimResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Kami telah mengirimkan link reset password ke email Anda!');
        }

        return back()->withErrors(['email' => 'Kami tidak dapat menemukan pengguna dengan alamat email tersebut.']);
    }

    //fungsi tampilkan form reset password
    public function tampilkanFormReset(Request $request, $token)
    {
        return view('pages.auth.04-updatepassword', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    //fungsi update password
    public function updatePassword(Request $request)
    {
        $credentials = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Password Anda berhasil diubah! Silakan login.');
        }

        return back()->withErrors(['email' => 'Token reset password ini tidak valid.']);
    }
}
