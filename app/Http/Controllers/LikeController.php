<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Notifications\KomentarDisukai;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class LikeController extends Controller
{
    /**
     * Like/unlike komentar via AJAX.
     */
    public function toggle(Komentar $komentar): JsonResponse
    {
        $user = Auth::guard('pengguna')->user();

        if ($komentar->isLikedBy($user)) {
            $komentar->unlike($user);
            $liked = false;
        } else {
            $komentar->like($user);

            // Kirim notifikasi email ke pemilik komentar
            if (
                $komentar->commenter
                && $komentar->commenter instanceof \App\Models\User
                && $komentar->commenter->id !== $user->id
            ) {
                Notification::send(
                    $komentar->commenter,
                    new KomentarDisukai($komentar, $user)
                );
            }

            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'total' => $komentar->totalLikes(),
        ]);
    }
}
