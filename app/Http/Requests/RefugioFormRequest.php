<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefugioFormRequest extends FormRequest
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
        return [
            'nombre_refugio'=>'required|max:255',
            'tipo_refugio'=>'required|max:100',
            'direccion'=>'required|max:255',
            'ubicacion'=>'max:255',
            'descripcion'=>'max:5000',
            'capacidad_maxima'=>'required|numeric',
            'capacidad_actual'=>'required|numeric',
            'telefono'=>'max:15',
            'contacto'=>'required|max:50',
            'recursos_disponibles'=>'max:50000',
            'estado'=>'max:20',
            'imagen'=>'mimes:jpeg,bmp,png',
        ];
    }
}
