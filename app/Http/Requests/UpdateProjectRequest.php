<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'user_ids' => 'required|array',
            'client_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'status' => 'required|string'
        ];
    }
}
