<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GaleriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Gambar wajib saat membuat data baru, opsional saat mengubah.
        $gambarRule = $this->isMethod('post')
            ? ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096']
            : ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'];

        return [
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => $gambarRule,
            'kegiatan_id' => ['nullable', Rule::exists('kegiatan_adat', 'id')],
            'tanggal_dokumentasi' => ['nullable', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul' => 'judul',
            'deskripsi' => 'deskripsi',
            'gambar' => 'foto',
            'kegiatan_id' => 'kegiatan terkait',
            'tanggal_dokumentasi' => 'tanggal dokumentasi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'exists' => ':attribute tidak ditemukan.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WebP.',
            'max' => ':attribute terlalu besar (maksimal 4 MB).',
        ];
    }
}
