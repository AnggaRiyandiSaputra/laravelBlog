<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            // Create rules
            dd('create');
        } else {
            // Update rules
            return [
                'id' => 'required|exists:posts,id',
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string|max:50',
                'description' => 'nullable',
                'content' => 'required',
                'status' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required',
            ];
        }
    }

    public function messages(): array
    {
        return [
            'id.required' => 'ID tidak boleh kosong',
            'id.exists' => 'ID tidak ditemukan',
            'user_id.required' => 'User ID tidak boleh kosong',
            'user_id.exists' => 'User ID tidak ditemukan',
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul maksimal 50 karakter',
            'content.required' => 'Konten tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'thumbnail.image' => 'Thumbnail harus berupa gambar',
            'thumbnail.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, gif, svg',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB',
            'status.required' => 'Status tidak boleh kosong',
        ];
    }
}
