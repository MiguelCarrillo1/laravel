<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class InicioController extends Controller{

    public function index(Request $request){
        return view('layouts/home');
    }

    public function index2(Request $request){
        return view('home.organizaciones');
    }

    public function desastres(Request $request){
        return view('home.desastres');
    }

    public function refugios(Request $request){
        return view('home.refugios');
    }

    public function quienes_somos(Request $request){
        return view('home.quienes_somos');
    }

    public function contacto(Request $request){
        return view('home.contacto');
    }

}
