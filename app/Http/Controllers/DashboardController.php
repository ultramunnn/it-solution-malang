<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();

        if ($user->role === 'customer') {
            return view('dashboard.customer.index');
        } elseif ($user->role === 'teknisi') {
            return view('dashboard.teknisi.index');
        }

        return redirect()->route('chat.index');
    }
}