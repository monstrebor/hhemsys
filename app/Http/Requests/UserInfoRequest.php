<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|date|before:today',
            'phone_number' => 'nullable|string|max:15',
            'street' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG files are allowed.',
            'image.max' => 'The image must not exceed 2MB.',
        ];
    }

}
