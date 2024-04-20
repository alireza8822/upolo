<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // You may define authorization logic here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'contacts' => 'required|array',
            'contacts.*.name' => 'required|string',
            'contacts.*.email' => 'required|email|unique:contacts,email', // Assuming each email should be unique
            'contacts.*.notes' => 'nullable|string', // Allow notes to be nullable
            // Add other validation rules as needed
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'The email has already been taken.',
            // Add custom error messages for other rules as needed
        ];
    }
}
