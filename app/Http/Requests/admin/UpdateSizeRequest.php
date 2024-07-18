<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSizeRequest extends FormRequest
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
            'size' => Rule::in(['S', 'M', 'L', 'XL']),
            'stock' => 'required|numeric|min:1|max:10000',
            'productCategory' => Rule::in(['Atasan', 'Bawahan', 'Aksesoris']),
            'productPrice' => 'required|numeric|min:1000',
            'productWeight' => 'required|numeric|min:1|max:10000',
            'productDescription' => 'required|min:10|max:2000',
            'gender' => Rule::in(['Pria', 'Wanita']),
            'picture.*' => 'image|max:4096',
        ];
    }
}
