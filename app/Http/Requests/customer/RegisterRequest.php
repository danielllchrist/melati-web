<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|max:255',
            'phoneNum' => 'required|min:9|max:12|unique:users,phoneNum',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|numeric',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
        ];
    }
}
