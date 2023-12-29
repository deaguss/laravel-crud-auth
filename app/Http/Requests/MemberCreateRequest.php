<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|max:150',
            'email' => 'required|unique:members|max:255',
            'no_hp' => 'required',
            'gender' => 'required|in:0,1',
            'trainer_id' => 'required|exists:trainers,id',
            'alamat' => 'required|max:255',
        ];
    }

    public function attributes(){
        return [
            'trainer_id' => 'trainer',
            'gender' => 'jenis kelamin',
        ];
    }

    public function messages(){
        return [
            'gender.required' => 'Jenis kelamin harap dipilih ya :) ini bukan amerika',
            'email.unique' => 'Email ini tidak bisa digunakan',
            'username.max' => 'Username tidak boleh lebih dari :max karakter',
        ];
    }
}
