<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartamentosCont;
use Inertia\Inertia;

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
Route::get('/', [LoginController::class, 'getLogin'])->name('login');
Route::post('/logear', [LoginController::class, 'login'])->name('logear');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registerUOut', [LoginController::class, 'registerOut'])->name('registerUOut');
Route::post('/registerUOut/registeredO', [LoginController::class, 'register'])->name('registerUOut.registeredO');
#Rutas para Jefe
Route::group(['middleware' => ['role:Jefe']], function(){
    #Formularios
    Route::get('/registerU', [LoginController::class, 'datesSelect'])->middleware('auth')->name('registerU');
    Route::get('/registerD', [DepartamentosCont::class, 'create'])->middleware('auth')->name('registerD');
    Route::get('/consDepart/{id}/editDep', [DepartamentosCont::class, 'edit'])->middleware('auth')->name('consDepart.edit');
    #Consultas
    Route::get('/consDepart', [DepartamentosCont::class, 'index'])->middleware('auth')->name('consDepart');
    Route::get('/consUser', [LoginController::class, 'users'])->middleware('auth')->name('consUser');
    #Formularios Envio
    Route::post('/registerU/registered', [LoginController::class, 'register'])->middleware('auth')->name('registerU.registered');
    Route::post('/registerD/saveD', [DepartamentosCont::class, 'store'])->middleware('auth')->name('registerD.saveD');
    Route::post('/startSesion', [LoginController::class, 'login'])->middleware('auth')->name('startSesion');
    #Formulario Actualización
    Route::put('/consDepart/{id}', [DepartamentosCont::class, 'update'])->middleware('auth')->name('consDepart.update');
});


Route::get('/asigAuxiliar', function () {
    return view('/asigAuxiliar');
})->middleware('auth')->name('asigAuxiliar');

Route::get('/controlTickets', function () {
    return view('controlTickets');
})->name('control');

Route::get('/report', function () {
    return view('report');
})->name('report');

