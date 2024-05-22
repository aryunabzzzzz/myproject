<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'nickname' => 'required|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'birthday' => 'required',
            'phone' => 'nullable|string',
            'img_url' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'info' => 'nullable|string|max:255'
        ];
    }
}
