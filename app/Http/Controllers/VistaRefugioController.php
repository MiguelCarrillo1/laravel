<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegisterRefugioFormRequest;
use App\Http\Requests\PersonaFormRequest;
use App\Models\Refugio;
use App\Models\Persona;
use App\Models\User;
use App\Models\RegisterRefugio;
use Auth;
use Carbon\Carbon;

class VistaRefugioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get('searchText'));
            $refugios = Refugio::where('nombre_refugio', 'LIKE', '%' . $query . '%')
                ->orWhere('tipo_refugio', 'LIKE', '%' . $query . '%')
                ->orderBy('id_refugio', 'desc')
                ->paginate(7);
            return view('refugios.index', ["refugios" => $refugios, "searchText" => $query]);
        }
    }

    public function index2(Request $request){
        return view('organizaciones.index');
    }
    
    public function create() {
        return view("refugios.create");
    }

    // Método para registrar al usuario en un refugio
   public function update(Request $request, RegisterRefugioFormRequest $registerRefugioRequest, $id_refugio){

        $refugio = Refugio::findOrFail($id_refugio);
        // Obtener el número de documento de la solicitud
        $numDocumento = $request->get('num_documento');

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si la cédula ya está registrada en la base de datos para otro usuario
        $persona = Persona::where('num_documento', $numDocumento)
                          ->where('id_usuario', '!=', $user->id) // Verifica si otro usuario tiene ese número de documento
                          ->first();

        if ($persona) {
            // La cédula ya está registrada para otro usuario
            return Redirect::back()->with('error', 'El número de documento ya está registrado para otro usuario.');
        }

        // Si la persona ya existe (mismo usuario), la recuperamos, si no, se crea una nueva.
        $persona = Persona::firstOrNew(['num_documento' => $numDocumento]);

        // Si la persona no existe, creamos una nueva
        if (!$persona->exists) {
            $persona->id_usuario = $user->id;
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
            $persona->estado = 'Activo';  // Estado inicial
            $persona->save(); // Guardar la nueva persona
        }

        // Registrar o actualizar la relación del usuario con el refugio
        $registro = RegisterRefugio::updateOrCreate(
            ['id_usuario' => $user->id, 'id_refugio' => $id_refugio], // Usamos $id_refugio desde la URL
            [
                'estado' => 'Activo', // Estado del registro
                'fecha_registro' => Carbon::now('America/Guayaquil')->toDateTimeString() // Fecha de registro
            ]
        );

        // Redirigir al usuario al listado de refugios con un mensaje de éxito
        return Redirect::to('refugios');
    }


    public function show($id) {
        return view("refugios.show", ["registro" => RegisterRefugio::findOrFail($id)]);
    }

    public function edit($id) {
        $refugio = Refugio::findOrFail($id);
        $persona = Persona::where('id_usuario', Auth::id())->first(); // Buscar la persona asociada al usuario
        return view('refugios.edit', compact('refugio', 'persona'));
    }
}
