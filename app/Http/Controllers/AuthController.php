<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Anhskohbo\NoCaptcha\NoCaptcha;
use Illuminate\Support\Facades\Http;



class AuthController extends Controller{

    public function register(){
        
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request){

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol = 'Usuario';
        $user->save();

        // Redirigir al usuario a la página de login después de un registro exitoso
        return redirect()->route('login')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }

    public function login(){
            
        return view('auth.login');
    }
    
    public function loginForm(LoginRequest $request){

        // Obtener los datos ingresados (nombre de usuario o correo electrónico)
        $usernameOrEmail = $request->username_or_email;
        $password = $request->password;

        // Buscar el usuario por nombre de usuario o correo electrónico
        $user = User::where('email', $usernameOrEmail)
                    ->orWhere('username', $usernameOrEmail)
                    ->first();

        // Intentamos autenticar al usuario
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user); // Obtener al usuario autenticado

            // Redirigimos dependiendo del rol del usuario
            if ($user->rol == 'Administrador') {
                return redirect()->route('layouts.admin');  // Redirige a un dashboard de admin
            }

            return redirect()->route('layouts.user');  // Redirige a un dashboard de usuario
        }

        // Si las credenciales son incorrectas, redirigimos con mensaje de error
        return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas.']);;
    }

    public function logout(){

        Auth::logout();
        
        return redirect()->route('layouts.home');

    }
    
}

