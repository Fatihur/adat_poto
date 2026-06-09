<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilDesaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul' => 'judul',
            'deskripsi' => 'deskripsi',
            'gambar' => 'gambar',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WebP.',
            'max' => ':attribute terlalu besar (maksimal 4 MB).',
        ];
    }
}
