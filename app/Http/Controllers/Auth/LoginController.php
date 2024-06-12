<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $role = Auth::user()->role;

        if ($role === 'supervisor' || $role === 'volunteer') {
            return '/books';
        } elseif ($role === 'user') {
            return '/home';
        } else {
            return '/home';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}