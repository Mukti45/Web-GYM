<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Izinkan semua pengguna yang terautentikasi
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Nama membership wajib diisi
            'price' => 'required|numeric|min:0', // Harga harus berupa angka dan tidak boleh negatif
            'duration' => 'required|integer|min:1', // Durasi harus angka minimal 1 bulan
            'description' => 'nullable|string|max:1000', // Deskripsi opsional, maksimal 1000 karakter
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama membership wajib diisi.',
            'name.string' => 'Nama membership harus berupa teks.',
            'name.max' => 'Nama membership tidak boleh lebih dari 255 karakter.',
            'price.required' => 'Harga membership wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',
            'duration.required' => 'Durasi membership wajib diisi.',
            'duration.integer' => 'Durasi harus berupa angka.',
            'duration.min' => 'Durasi minimal adalah 1 bulan.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 1000 karakter.',
        ];
    }
}
