<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'article' => 'required|string|unique:products|regex:/^[A-Za-z0-9]+$/i|max:255',
            'name' => 'required|string|min:10|max:255',
            'status' => 'required|max:255',
            'data' => 'array'
        ];
    }
}
