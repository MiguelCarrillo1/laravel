<?php

namespace App\Http\Controllers;

use App\Models\Respuestas;
use Illuminate\Http\Request;

class RespuestaController extends Controller{
    public function __construct(){
        $this->middleware('auth'); // Asegura que el usuario esté autenticado
    }

    public function store(Request $request, $publicacionId){
        $request->validate([
            'contenido' => 'required|string|max:255',
        ]);

        // Crear una nueva respuesta
        $respuesta = new Respuestas();
        $respuesta->contenido = $request->contenido;
        $respuesta->id_publicacion = $publicacionId;
        $respuesta->id_usuario = auth()->id(); // Usuario autenticado
        $respuesta->save();

        // Redirigir a la página de la publicación con la respuesta guardada
        return redirect()->route('publicaciones.index');
    }

    public function update(Request $request, $id_respuesta){
        $respuesta = Respuestas::findOrFail($id_respuesta);
        $respuesta->contenido = $request->get('contenido');
        $respuesta->save();

        return redirect()->route('publicaciones.index');
    }

    public function destroy($id_respuesta){
        $respuesta = Respuestas::findOrFail($id_respuesta);
        $respuesta->delete();

        return redirect()->route('publicaciones.index');
    }
}
