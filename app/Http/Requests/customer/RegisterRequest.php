<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
        return [
            'name' => 'required|min:10|max:255',
            'gender' => Rule::in(['Pria', 'Wanita']),
            'phoneNum' => 'required|unique:users,phoneNum|min:10|max:15',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|numeric|min:12',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
        ];
    }
}
