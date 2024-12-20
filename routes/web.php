<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\VistaInicioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RefugioController;
use App\Http\Controllers\VistaRefugioController;
use App\Http\Controllers\RefugiadoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\DesastresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('layouts/home');
})->name('layouts.home');

/*Rutas definidas*/
Route::resource('layouts/home', VistaInicioController::class);
Route::resource('refugio', RefugioController::class);
Route::resource('refugios', VistaRefugioController::class);
Route::resource('organizaciones', VistaRefugioController::class);
Route::resource('refugiados', RefugiadoController::class);
Route::resource('seguridad/usuario', UsuarioController::class);
Route::resource('publicaciones', PublicacionController::class);

/*RUTAS PARA INICIO Y REGISTRO DE USUARIOS*/
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerStore']);
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginForm']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

/*RUTAS PARA PANEL DE ADMINISTRADOR, USUARIO, PAGINA PRINCIPAL*/
Route::get('layouts/admin', [VistaController::class, 'index'])->middleware('auth')->name('layouts.admin');
Route::get('layouts/usuario', [VistaController::class, 'index2'])->middleware('auth')->name('layouts.user');
Route::get('home', [InicioController::class, 'index'])->name('home');

/*RUTAS A LAS QUE ACCEDE EL ADMINISTRADOR*/
Route::get('refugio', [RefugioController::class, 'index'])->middleware('auth')->name('refugio');
Route::get('refugiado', [RefugiadoController::class, 'index'])->middleware('auth')->name('refugiado');
Route::get('seguridad/usuario', [UsuarioController::class, 'index'])->middleware('auth')->name('seguridad.usuario');


/*RUTAS A LA QUE ACCEDE EL USUARIO*/
Route::get('perfil/personal', [UsuarioController::class, 'index2'])->middleware('auth')->name('perfil.personal');
Route::get('refugios', [VistaRefugioController::class, 'index'])->middleware('auth')->name('refugios');
Route::get('organizaciones', [VistaRefugioController::class, 'index2'])->name('organizaciones');
Route::get('perfil/edit', [PerfilController::class, 'edit'])->name('actualizar');
Route::put('perfil/{id}', [PerfilController::class, 'update'])->name('perfil.update');
Route::put('publicaciones', [PublicacionController::class, 'index'])->name('publicacion.index');
Route::post('publicaciones/{id_publicacion}/respuestas', [RespuestaController::class, 'store'])->name('respuestas.store');
Route::patch('respuestas/{respuesta}', [RespuestaController::class, 'update'])->name('respuestas.update');
Route::delete('respuestas/{respuesta}', [RespuestaController::class, 'destroy'])->name('respuestas.destroy');



/*RUTAS PUBLICAS*/
Route::get('home/organizaciones', [InicioController::class, 'index2'])->name('organizacioneshome');
Route::get('home/desastres', [InicioController::class, 'desastres'])->name('desastres');
Route::get('home/refugios', [InicioController::class, 'refugios'])->name('refugios');
Route::get('home/quienes-somos', [InicioController::class, 'quienes_somos'])->name('quienes_somos');
Route::get('home/contacto', [InicioController::class, 'contacto'])->name('contacto');

//PDF

//Route::get('/export-pdf', [RefugiadoController::class, 'exportPdf'])->name('refugiados.exportPdf');

Route::get('/export-PdfR', [RefugiadoController::class, 'exportPdfR'])->name('refugiado.exportPdfR');
Route::get('/exportPdfUsuarios', [UsuarioController::class, 'exportPdfUsuarios'])->name('usuario.exportPdfUsuarios');



Route::get('/pdf', [DesastresController::class, 'generarPdf'])->name('desastres.pdf');


Route::get('/export-pdf', [RefugioController::class, 'exportPdf'])->name('refugio.exportPdf');

Route::prefix('refugio')->group(function () {
    Route::get('/create', [RefugioController::class, 'create'])->name('refugio.create');
});





Route::get('/{slug}', function ($slug) {
    // Si el usuario está autenticado, redirige según su rol
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->rol == 'Administrador') {
            return redirect()->route('layouts.admin');
        }
        return redirect()->route('layouts.user');
    }
    // Si el usuario no está autenticado, redirige a la página principal (home)
    return redirect()->route('layouts.home');
})->where('slug', '.*');
