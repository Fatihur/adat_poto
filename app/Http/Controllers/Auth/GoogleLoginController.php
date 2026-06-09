<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    /**
     * Alihkan ke Google OAuth.
     */
    public function redirect(): RedirectResponse
    {
        // Simpan URL sebelumnya supaya bisa redirect balik
        session()->put('google_login_intended', url()->previous());

        return Socialite::driver('google')->redirect();
    }

    /**
     * Terima callback dari Google.
     */
    public function callback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('beranda')
                ->with('error', 'Gagal login dengan Google. Silakan coba lagi.');
        }

        // Cari atau buat user
        $user = User::where('google_id', $googleUser->getId())->first();

        if (! $user) {
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Update google_id untuk user existing
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            } else {
                // Buat user baru
                $user = User::create([
                    'google_id' => $googleUser->getId(),
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            }
        }

        // Login sebagai pengguna
        Auth::guard('pengguna')->login($user, true);

        // Redirect ke halaman asal
        $intended = session()->pull('google_login_intended', route('beranda'));

        return redirect()->to($intended);
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('pengguna')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda');
    }
}
