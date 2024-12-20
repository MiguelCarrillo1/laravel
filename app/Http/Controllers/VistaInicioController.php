<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegisterRefugioFormRequest;
use App\Models\RefugioUser;
use DB;

class VistaInicioController extends Controller{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('layouts/home');
    }

    public function register(Request $request){

        // Subir foto de perfil si se proporciona
        $fotoPerfil = null;
        if ($request->hasFile('foto_perfil')) {
            $fotoPerfil = $request->file('foto_perfil')->store('fotos_perfil', 'public');
        }

        // Guardar en la tabla persona
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->foto_perfil = $fotoPerfil;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->numero_documento = $request->numero_documento;
        $persona->direccion = $request->direccion;
        $persona->discapacidad = $request->discapacidad;
        $persona->patologia = $request->patologia;
        $persona->tipo_sanguineo = $request->tipo_sanguineo;
        $persona->estado = 'Activo'; // Puedes ajustar el estado según la lógica
        $persona->fecha_registro = now();
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->sexo = $request->sexo;
        $persona->nacionalidad = $request->nacionalidad;
        $persona->telefono = $request->telefono;
        $persona->email = Auth::user()->email; // Email del usuario actual
        $persona->save();

        // Insertar en la tabla transaccional si corresponde
        $transaccion = new Transaccion();
        $transaccion->persona_id = $persona->id;
        $transaccion->refugio_id = $request->refugio_id; // Asegúrate de tener el ID del refugio
        $transaccion->fecha = now();
        $transaccion->save();

        return redirect()->route('refugios.index')->with('success', 'Registro exitoso.');
    }

}
