<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartamentosCont;
use App\Http\Controllers\TicketControl;
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
Route::get('/newTicket', [TicketControl::class, 'create'])->middleware('auth')->name('newTicket');
Route::post('/newTicket/saveT', [TicketControl::class, 'store'])->middleware('auth')->name('newTicket.saveT');
#Rutas para Jefe
Route::group(['middleware' => ['role:Jefe']], function(){
    Route::get('/home', [LoginController::class, 'home'])->middleware('auth')->name('home');
    #Formularios
    Route::get('/{id}/editUser', [LoginController::class, 'edit'])->middleware('auth')->name('editUser');
    Route::get('/registerU', [LoginController::class, 'datesSelect'])->middleware('auth')->name('registerU');
    Route::get('/registerD', [DepartamentosCont::class, 'create'])->middleware('auth')->name('registerD');
    Route::get('/consDepart/{id}/editDep', [DepartamentosCont::class, 'edit'])->middleware('auth')->name('consDepart.edit');
    #Consultas
    Route::get('/consDepart', [DepartamentosCont::class, 'index'])->middleware('auth')->name('consDepart');
    Route::get('/consUser', [LoginController::class, 'users'])->middleware('auth')->name('consUser');
    Route::get('/controlTickets', [TicketControl::class, 'index'])->middleware('auth')->name('control');
    Route::get('/controlTickets/{id}/asigAuxiliar', [TicketControl::class, 'index1'])->middleware('auth')->name('asigAuxiliar');
    #Formularios Envio
    Route::post('/registerU/registered', [LoginController::class, 'register'])->middleware('auth')->name('registerU.registered');
    Route::post('/registerD/saveD', [DepartamentosCont::class, 'store'])->middleware('auth')->name('registerD.saveD');
    Route::post('/startSesion', [LoginController::class, 'login'])->middleware('auth')->name('startSesion');
    #Formulario Actualización
    Route::put('/consDepart/{id}', [DepartamentosCont::class, 'update'])->middleware('auth')->name('consDepart.update');
    Route::put('/controlTickets/{id}', [TicketControl::class, 'update'])->middleware('auth')->name('controlTickets.update');
    #Formulario Delete
    Route::delete('/consDepart/{id}', [DepartamentosCont::class, 'destroy'])->middleware('auth')->name('consDepart.destroy');
});


Route::get('/report', function () {
    return view('report');
})->name('report');

