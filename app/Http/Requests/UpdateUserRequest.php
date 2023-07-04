<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class
UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:60',
            'email' => 'required|email|max:60',

        ];
       if(!is_null($this->request->get('password')))
       {
           $rules['password'] = 'between:6,60';
       }

        return $rules;
    }
}
