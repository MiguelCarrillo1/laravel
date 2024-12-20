<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonaFormRequest extends FormRequest
{
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
        $userId = $this->route('user');

        return [
            'nombre'=>'required|max:75',
            'id_usuario'=>'max:11',
            'apellido'=>'required|max:75',
            'foto_perfil'=>'mimes:jpeg,bmp,png',
            'tipo_documento'=>'required|max:50',
            'fecha_nacimiento'=>'date',
            'sexo'=>'max:25',
            'nacionalidad'=>'required|max:50',
            'discapacidad'=>'max:50000',
            'patologia'=>'max:50000',
            'tipo_sanguineo'=>'required|max:10',
            'direccion'=>'max:255',
            'telefono'=>'max:15',
            'email'=> ['required','email',Rule::exists('users', 'email'), /* Verifica que el correo exista en la tabla 'users'*/],
            'estado'=>'max:15',
        ];
    }
}
