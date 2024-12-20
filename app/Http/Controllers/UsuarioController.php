<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioFormRequest;
use App\Models\User;
use DB;
use PDF;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){

        if ($request){

            $query=trim($request->get('searchText'));

            $usuarios=DB::table('users')
            ->where('username','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);

            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function exportPdfUsuarios()
{
    // Obtén los usuarios desde tu base de datos
    $usuarios = User::all(); // Asegúrate de usar el modelo adecuado y la consulta necesaria

    // Generar el PDF
    $pdf = PDF::loadView('seguridad.usuario.pdf', ['usuarios' => $usuarios])
              ->setPaper('a4', 'landscape'); // A4 en orientación horizontal

    // Descarga el PDF
    return $pdf->download('listado-usuarios.pdf');
}

    public function create(){

        return view("seguridad.usuario.create");
    }

    public function store(UsuarioFormRequest $request){

        $usuario=new User;
        $usuario->username=$request->get('username');
        $usuario->email=$request->get('email');
        $usuario->password=Hash::make($request->password);
        $usuario->rol=$request->get('rol');
        $usuario->save();

        return Redirect::to('seguridad/usuario');
    }

    public function edit($id){

        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest $request,$id){

        $usuario=User::findOrFail($id);
        $usuario->username=$request->get('username');
        $usuario->email=$request->get('email');
        $usuario->rol=$request->get('rol');
        
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return Redirect::to('seguridad/usuario');
    }

    public function destroy($id){

        $usuario=DB::table('users')
        ->where('id','=',$id)->delete();

        return Redirect::to('seguridad/usuario');
    }
}


