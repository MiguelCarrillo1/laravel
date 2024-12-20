<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use App\Models\Persona;
use App\Models\User;
use DB;
use PDF;


class RefugiadoController extends Controller{

	public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
            $personas=DB::table('persona as p')
            ->join('users as u', 'p.id_usuario', '=', 'u.id')
            ->select('p.id_persona','p.nombre','p.apellido','p.foto_perfil','p.tipo_documento','p.num_documento','p.fecha_nacimiento','p.sexo','p.nacionalidad','p.discapacidad','p.patologia','p.tipo_sanguineo','p.direccion','p.telefono','u.email as usuario_email','p.estado')
            ->where('num_documento','LIKE','%'.$query.'%')
            ->orWhere('u.email', 'LIKE', '%' . $query . '%')
            ->orderBy('id','desc')
            ->paginate(7);

            return view('refugiado.index',["personas"=>$personas,"searchText"=>$query]);
    	}
    }

    public function exportPdfR()
    {
        $personas = Persona::all(); // Reemplaza con tu consulta específica
    
        // Generar el PDF con orientación horizontal
        $pdf = PDF::loadView('refugiado.pdf', ['personas' => $personas])
                  ->setPaper('a4', 'landscape'); // Tamaño A4 y orientación horizontal
    
        return $pdf->download('listado-refugiados.pdf');
    }
    public function create(){

        return view("refugiado.create");
    }

    public function store(PersonaFormRequest $request){

        // Obtener el correo electrónico desde el formulario
        $email = $request->get('email');
        
        // Buscar el usuario asociado a este correo electrónico
        $user = User::where('email', $email)->first();  

        // Si el usuario no existe, manejar el error
        if (!$user) {
            return Redirect::back()->withErrors(['email' => 'El email no está asociado a ningún usuario.']);
        }

        // Obtener el id del usuario
        $persona=new Persona;
        $persona->id_usuario = $user->id;
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');

        if ($request->hasFile('foto_perfil')) {
            $file = $request->file('foto_perfil');
            $file->move(public_path('imagenes/refugiados/'), $file->getClientOriginalName());
            $persona->foto_perfil = $file->getClientOriginalName();
        }

        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
        $persona->sexo=$request->get('sexo');
        $persona->nacionalidad=$request->get('nacionalidad');
        $persona->discapacidad=$request->get('discapacidad');
        $persona->patologia=$request->get('patologia');
        $persona->tipo_sanguineo=$request->get('tipo_sanguineo');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->estado='Activo';
        $persona->save();

        return Redirect::to('refugiados');
    }

    public function show($id) {
        return view("refugiado.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id) {
        $persona=Persona::findOrFail($id);
        return view("refugiado.edit",["persona"=>$persona]);
    }

    
    public function update(PersonaFormRequest $request,$id){

        $persona=Persona::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');

        if ($request->hasFile('foto_perfil')) {
            $file = $request->file('foto_perfil');
            $file->move(public_path('imagenes/refugiados'), $file->getClientOriginalName());
            $persona->foto_perfil = $file->getClientOriginalName();
        }

        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
        $persona->sexo=$request->get('sexo');
        $persona->nacionalidad=$request->get('nacionalidad');
        $persona->discapacidad=$request->get('discapacidad');
        $persona->patologia=$request->get('patologia');
        $persona->tipo_sanguineo=$request->get('tipo_sanguineo');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->estado=$request->get('estado');
        $persona->save();

        return Redirect::to('refugiados');
    }

    public function destroy($id){
		$persona=Persona::findOrFail($id);
        $persona->estado='Inactivo';
        $persona->save();

        return Redirect::to('refugiados');
    }
}
