<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'username' => ['required', Rule::unique('users')->ignore($this->user()->id)],
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'avatarPath' => 'nullable|image|mimes:jpeg,png,jpg',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'info' => 'nullable|string|max:255'
        ];
    }
}
