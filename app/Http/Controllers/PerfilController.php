<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PerfilFormRequest;
use App\Models\Persona;
use Auth;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Asegura que el usuario esté autenticado
    }

    // Mostrar el formulario de edición de datos personales
    public function edit()
    {
        // Buscar o crear una persona asociada al usuario autenticado
        $persona = Persona::firstOrNew(['id_usuario' => Auth::id()]);
        return view('perfil.personal.edit', compact('persona'));
    }

    // Actualizar o crear los datos de la persona
    public function update(PerfilFormRequest $request, $id){
        // Buscar la persona asociada al usuario autenticado
        $persona = Persona::where('id_usuario', Auth::id())->first();

        // Si no existe, se crea una nueva instancia
        if (!$persona) {
            $persona = new Persona();
            $persona->id_usuario = Auth::id(); // Asociar al usuario autenticado
        }

        // Validar si el número de documento ya está registrado para otro usuario
        $numDocumento = $request->get('num_documento');
        $existeDocumento = Persona::where('num_documento', $numDocumento)
            ->where('id_usuario', '!=', Auth::id())
            ->exists();

        if ($existeDocumento) {
            return Redirect::back()->with('error', 'El número de documento ya está registrado para otro usuario.');
        }

        // Actualizar o asignar los datos de la persona
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->tipo_documento = $request->get('tipo_documento');
        $persona->num_documento = $numDocumento;
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->nacionalidad = $request->get('nacionalidad');
        $persona->discapacidad = $request->get('discapacidad');
        $persona->patologia = $request->get('patologia');
        $persona->tipo_sanguineo = $request->get('tipo_sanguineo');
        $persona->direccion = $request->get('direccion');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->estado = 'Activo';

        // Guardar los cambios en la base de datos
        $persona->save();



        // Redirigir con un mensaje de éxito
        return Redirect::route('layouts.user')
            ->with('success', $persona->wasRecentlyCreated ? 'Perfil creado exitosamente.' : 'Perfil actualizado exitosamente.');
    }
}
