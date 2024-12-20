<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RefugioFormRequest;
use App\Models\Refugio;
use DB;
use PDF;

class RefugioController extends Controller{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request) {
            $query=trim($request->get('searchText'));
            $refugios=DB::table('refugio as r')
            ->select('r.id_refugio','r.nombre_refugio','r.tipo_refugio','r.direccion','r.capacidad_maxima','r.capacidad_actual','r.telefono','r.contacto','r.recursos_disponibles','r.imagen','r.estado')
            ->where('r.nombre_refugio','LIKE','%'.$query.'%')
            ->orwhere('r.tipo_refugio','LIKE','%'.$query.'%')
            ->orderBy('r.id_refugio','desc')
            ->paginate(7);
            return view('refugio.index',["refugios"=>$refugios,"searchText"=>$query]);
        }
    }
    public function exportPdf() {
            $refugios = \DB::table('refugio as r')->get(); 
            //dd($refugios);
            $pdf = PDF::loadView('refugio.pdf', ['refugios' => $refugios]);
            
            return $pdf->download('refugios-listado.pdf');
    }
    public function create() {
        return view("refugio.create");
    }

    public function store(RefugioFormRequest $request) {
        $refugio=new Refugio;
        $refugio->nombre_refugio=$request->get('nombre_refugio');
        $refugio->tipo_refugio=$request->get('tipo_refugio');
        $refugio->direccion=$request->get('direccion');
        $refugio->ubicacion=$request->get('ubicacion');
        $refugio->descripcion=$request->get('descripcion');
        $refugio->capacidad_maxima=$request->get('capacidad_maxima');
        $refugio->capacidad_actual=$request->get('capacidad_actual');
        $refugio->telefono=$request->get('telefono');
        $refugio->contacto=$request->get('contacto');
        $refugio->recursos_disponibles=$request->get('recursos_disponibles');
        $refugio->estado='Disponible';

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $file->move(public_path('imagenes/refugios/'), $file->getClientOriginalName());
            $refugio->imagen = $file->getClientOriginalName();
        }

        $refugio->save();
        return Redirect::to('refugio');
    }

    public function show($id) {
        return view("refugio.show",["refugio"=>Refugio::findOrFail($id)]);
    }

    public function edit($id) {
        $refugio=Refugio::findOrFail($id);
        return view("refugio.edit",["refugio"=>$refugio]);
    }

    public function update(RefugioFormRequest $request,$id) {

        $refugio=Refugio::findOrFail($id);

        $refugio->nombre_refugio=$request->get('nombre_refugio');
        $refugio->tipo_refugio=$request->get('tipo_refugio');
        $refugio->direccion=$request->get('direccion');
        $refugio->ubicacion=$request->get('ubicacion');
        $refugio->descripcion=$request->get('descripcion');
        $refugio->capacidad_maxima=$request->get('capacidad_maxima');
        $refugio->capacidad_actual=$request->get('capacidad_actual');
        $refugio->telefono=$request->get('telefono');
        $refugio->contacto=$request->get('contacto');
        $refugio->recursos_disponibles=$request->get('recursos_disponibles');
        $refugio->estado=$request->get('estado');

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $file->move(public_path('imagenes/refugios'), $file->getClientOriginalName());
            $refugio->imagen = $file->getClientOriginalName();
        }

        $refugio->save();
        return Redirect::to('refugio');
    }

    public function destroy($id) {
        $refugio=Refugio::findOrFail($id);
        $refugio->estado='No disponible';
        $refugio->save();
        return Redirect::to('refugio');
    }
}
