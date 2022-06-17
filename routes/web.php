<?php

use Illuminate\Support\Facades\Route;

//agregar los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProspectosController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('prospectos', ProspectosController::class);
    Route::resource('campus', CampusController::class);
    Route::resource('clientes', ClienteController::class);
    Route::get('clientes/verCampus/{id}', [ClienteController::class,'verCampus'])->name('clientes.verCampus');
});

Route::get('/registro',[UserController::class,'index']); //retorna formulario registro
Route::post('datos', [UserController::class,'store']); // hace el registro

Route::get('mostrar',[UserController::class,'VerRegistros']); // muestra registros todos

Route::get('consulta',[UserController::class,'show']); //retorna formulario para consultar
Route::get('editar',[UserController::class,'show2']); // retorna formulario para editar -- mismo consulta
Route::get('cambios',[UserController::class,'actUser']); // realiza el cambio en los datos del registro

Route::get('eliminar',[UserController::class,'delete']); 
Route::delete('borrar',[UserController::class,'destroy']);