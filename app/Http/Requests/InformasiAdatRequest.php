<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InformasiAdatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'status' => ['required', Rule::in(['terbit', 'draf'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul' => 'judul',
            'kategori' => 'kategori',
            'deskripsi' => 'deskripsi',
            'gambar' => 'gambar',
            'status' => 'status publikasi',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'in' => ':attribute tidak valid.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WebP.',
            'max' => ':attribute terlalu besar (maksimal 4 MB).',
        ];
    }
}
