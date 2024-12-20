<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth; 

class RegisterRefugioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiar a false si quieres restringir el acceso a esta solicitud
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $userId = Auth::id();
        return [
            'id_usuario'=>'integer|exists:users,id',
            'id_refugio'=>'integer|exists:refugio,id',
            'nombre'=>'required|string|max:255',
            'apellido'=>'required|string|max:255',
            'foto_perfil'=>'image|mimes:jpeg,png,jpg|max:2048',
            'tipo_documento'=>'required|string|max:50',
            'num_documento' => [
                'required',
                'string',
                'max:20',
                Rule::unique('persona', 'num_documento')->where(function ($query) use ($userId) {
                    return $query->where('id_usuario', '!=', $userId); // Verifica que no haya otra persona con el mismo número de documento pero distinto usuario
                }),
            ],
            'direccion'=>'required|string|max:255',
            'discapacidad'=>'nullable|max:5000',
            'patologia'=>'nullable|max:5000',
            'tipo_sanguineo'=>'required|string|max:3',
            'estado'=>'string|max:15', // Estado del registro
            'fecha_registro'=>'date',
            'fecha_nacimiento'=>'date',
            'sexo'=>'required|string|max:25',
            'nacionalidad'=>'required|string|max:50',
            'telefono'=>'required|string|max:15',
            'email'=>['required','email',Rule::exists('users', 'email')], // Verifica que el correo exista en la tabla `users`,
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'id_usuario.required' => 'El ID del usuario es obligatorio.',
            'id_usuario.exists' => 'El ID del usuario debe existir en el sistema.',
            'id_refugio.required' => 'El ID del refugio es obligatorio.',
            'id_refugio.exists' => 'El ID del refugio debe ser válido.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'foto_perfil.image' => 'La foto de perfil debe ser una imagen válida.',
            'foto_perfil.mimes' => 'La foto de perfil debe estar en formato jpeg, png o jpg.',
            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'num_documento.required' => 'El número de documento es obligatorio.',
            'num_documento.unique' => 'El número de documento ya está registrado.',
            'direccion.required' => 'La dirección es obligatoria.',
            'tipo_sanguineo.required' => 'El tipo sanguíneo es obligatorio.',
            'estado.required' => 'El estado es obligatorio.',
            'fecha_registro.required' => 'La fecha de registro es obligatoria.',
            'fecha_registro.date' => 'La fecha de registro debe ser válida.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser válida.',
            'sexo.required' => 'El sexo es obligatorio.',
            'nacionalidad.required' => 'La nacionalidad es obligatoria.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.exists' => 'El correo electrónico no está registrado.',
        ];
    }
}
