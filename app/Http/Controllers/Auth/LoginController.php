<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login admin.
     */
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    /**
     * Proses login admin.
     */
    public function login(Request $request): RedirectResponse
    {
        $kredensial = $request->validate([
            'email' => ['required', 'email'],
            'kata_sandi' => ['required', 'string'],
        ], [], [
            'email' => 'email',
            'kata_sandi' => 'kata sandi',
        ]);

        $ingat = $request->boolean('ingat');

        if (! Auth::attempt(
            ['email' => $kredensial['email'], 'password' => $kredensial['kata_sandi']],
            $ingat
        )) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Proses logout admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
