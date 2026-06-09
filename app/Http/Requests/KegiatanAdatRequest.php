<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KegiatanAdatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'tanggal_kegiatan' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'status' => ['required', Rule::in(['akan_datang', 'berlangsung', 'selesai'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'judul' => 'judul kegiatan',
            'tanggal_kegiatan' => 'tanggal kegiatan',
            'lokasi' => 'lokasi',
            'deskripsi' => 'deskripsi',
            'gambar' => 'gambar',
            'status' => 'status kegiatan',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'in' => ':attribute tidak valid.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WebP.',
            'max' => ':attribute terlalu besar (maksimal 4 MB).',
        ];
    }
}
