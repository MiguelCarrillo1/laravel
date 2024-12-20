<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
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
            'username_or_email' => 'required|string', // Cambié 'email' por 'username_or_email'
            'password' => 'required|string',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */

    public function messages(): array
    {
        return [
            'username_or_email.required' => 'El nombre de usuario o correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ];
    }
}
