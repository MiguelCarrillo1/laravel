<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicaciones;
use App\Http\Requests\PublicacionFormRequest;
use DB;
use Carbon\Carbon;

class PublicacionController extends Controller{
    public function __construct()
    {
        $this->middleware('auth'); // Asegura que el usuario esté autenticado
    }

    // Listar publicaciones
    public function index(){
        $publicaciones = Publicaciones::with('usuario') // Relación definida en el modelo
            ->orderBy('id_publicacion', 'desc')
            ->paginate(7);

        return view('publicaciones.index', ["publicaciones" => $publicaciones]);
    }

    // Mostrar el formulario de creación
    public function create(){
        return view('publicaciones.create');
    }

    // Almacenar una nueva publicación
    public function store(PublicacionFormRequest $request){
        $publicacion = new Publicaciones;
        $publicacion->id_usuario = auth()->id(); // Obtener ID del usuario autenticado
        $publicacion->contenido = $request->get('contenido');
        $publicacion->fecha_publicacion = now(); // Usa 'now()' directamente
        $publicacion->save();

        return redirect()->route('publicaciones.index');
    }

    // Mostrar una publicación específica
    public function show($id){
        $publicacion = Publicaciones::with(['usuario','respuestas.usuario'])->findOrFail($id);
        return view('publicaciones.show', compact('publicacion'));
    }

    // Mostrar el formulario de edición (opcional)
    public function edit($id){
        $publicacion = Publicaciones::findOrFail($id);
        return view('publicaciones.edit', compact('publicacion'));
    }

    // Actualizar una publicación existente
    public function update(PublicacionFormRequest $request, $id){
        $publicacion = Publicaciones::findOrFail($id);
        $publicacion->contenido=$request->get('contenido');
        $publicacion->save();
        return redirect()->route('publicaciones.index');
    }

    // Eliminar una publicación
    public function destroy($id){
        $publicacion = Publicaciones::findOrFail($id);
        $publicacion->delete();
        return redirect()->route('publicaciones.index');
    }
}
