<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class VistaController extends Controller{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('layouts/admin');
    }

    public function index2(Request $request){
        return view('layouts/user');
    }

}
