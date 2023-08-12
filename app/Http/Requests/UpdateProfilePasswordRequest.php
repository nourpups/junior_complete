<?php

namespace App\Http\Requests;

use App\Rules\MatchCurrentPassword;
use App\Rules\NotSamePassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilePasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', new MatchCurrentPassword()],
            'new_password' => ['required', new NotSamePassword()]
        ];
    }
}
