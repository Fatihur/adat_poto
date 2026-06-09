<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait MengelolaGambar
{
    /**
     * Simpan file gambar ke disk publik pada folder tertentu.
     */
    protected function simpanGambar(UploadedFile $file, string $folder): string
    {
        return $file->store($folder, 'public');
    }

    /**
     * Hapus gambar lama dari disk publik bila ada.
     */
    protected function hapusGambar(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
