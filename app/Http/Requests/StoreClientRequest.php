<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:60',
            'email' => 'required|email|unique:clients,email|max:60',
            'company_name' => 'required|max:60',
            'company_city' => 'required|max:60',
            'company_address' => 'required|max:100'
        ];

    }
}
