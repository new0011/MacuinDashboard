<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartamentosCont;
use App\Http\Controllers\TicketControl;
use App\Http\Controllers\printReports;
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
Route::get('/home', [LoginController::class, 'home'])->middleware('auth')->name('home');
Route::group(['middleware' => ['role:Cliente']], function(){
    Route::get('/newTicket', [TicketControl::class, 'create'])->middleware('auth')->name('newTicket');
    Route::post('/newTicket/saveT', [TicketControl::class, 'store'])->middleware('auth')->name('newTicket.saveT');
    Route::get('/{email}/consTicketCli', [TicketControl::class, 'indexCli'])->middleware('auth')->name('consTicketCli.index');
    Route::put('/consTicketCli/{id}', [TicketControl::class, 'updateStat'])->middleware('auth')->name('consTicketCli.updateStat');
});
Route::group(['middleware' => ['role:Auxiliar']], function(){
    Route::get('/{id}/consTicketAux', [TicketControl::class, 'indexAux'])->middleware('auth')->name('consTicketAux.index');
    Route::get('/{id}/consTicketAux/changeStatus', [TicketControl::class, 'changeS'])->middleware('auth')->name('consTicketAux.changeS');
    Route::put('/changeStatus/{id}', [TicketControl::class, 'updateStat1'])->middleware('auth')->name('changeStatus.update');
    Route::get('/reportAux', [printReports::class, 'createContA'])->middleware('auth')->name('createContA');
    Route::post('/reportAux/imprimir', [printReports::class, 'printContA'])->middleware('auth')->name('printCA');
    Route::get('/printTicketA', [printReports::class, 'indexA'])->middleware('auth')->name('printTicketA');
});
#Rutas para Jefe
Route::group(['middleware' => ['role:Jefe']], function(){
    #Imprimir en PDF
    Route::post('/reportJefe/imprimir', [printReports::class, 'printContJ'])->middleware('auth')->name('printCJ');
    #Formularios
    Route::get('/reportJefe', [printReports::class, 'createContJ'])->middleware('auth')->name('createContJ');
    Route::get('/{id}/editUser', [LoginController::class, 'edit'])->middleware('auth')->name('editUser');
    Route::get('/registerU', [LoginController::class, 'datesSelect'])->name('registerU');
    Route::get('/registerD', [DepartamentosCont::class, 'create'])->middleware('auth')->name('registerD');
    Route::get('/consDepart/{id}/editDep', [DepartamentosCont::class, 'edit'])->middleware('auth')->name('consDepart.edit');
    Route::get('/controlTickets/{id}/comment', [TicketControl::class, 'comment'])->middleware('auth')->name('controlTickets.comment');
    Route::get('/controlTickets/{id}/observ', [TicketControl::class, 'observ'])->middleware('auth')->name('controlTickets.observ');
    #Consultas
    Route::get('/consDepart', [DepartamentosCont::class, 'index'])->middleware('auth')->name('consDepart');
    Route::get('/consUser', [LoginController::class, 'users'])->middleware('auth')->name('consUser');
    Route::get('/controlTickets', [TicketControl::class, 'index'])->middleware('auth')->name('control');
    Route::get('/printTicket', [printReports::class, 'index'])->middleware('auth')->name('printTicket');
    Route::get('/controlTickets/{id}/asigAuxiliar', [TicketControl::class, 'index1'])->middleware('auth')->name('asigAuxiliar');
    #Formularios Envio
    Route::post('/registerU/registered', [LoginController::class, 'register'])->name('registerU.registered');
    Route::post('/registerD/saveD', [DepartamentosCont::class, 'store'])->middleware('auth')->name('registerD.saveD');
    Route::post('/startSesion', [LoginController::class, 'login'])->middleware('auth')->name('startSesion');
    #Formulario Actualización
    Route::put('/consDepart/{id}', [DepartamentosCont::class, 'update'])->middleware('auth')->name('consDepart.update');
    Route::put('/asigAuxiliar/{id}', [TicketControl::class, 'update'])->middleware('auth')->name('asigAuxiliar.update');
    Route::put('/comment/{id}', [TicketControl::class, 'updateC'])->middleware('auth')->name('comment.updateC');
    Route::put('/observ/{id}', [TicketControl::class, 'updateO'])->middleware('auth')->name('observ.updateO');
    #Formulario Delete
    Route::delete('/consDepart/{id}', [DepartamentosCont::class, 'destroy'])->middleware('auth')->name('consDepart.destroy');
    Route::delete('/consUser/{id}', [LoginController::class, 'destroy'])->middleware('auth')->name('consUser.destroy');
});


Route::get('/report', function () {
    return view('report');
})->name('report');

