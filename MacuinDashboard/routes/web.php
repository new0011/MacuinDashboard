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
Route::get('/registerU', [LoginController::class, 'datesSelect'])->name('registerU');
Route::post('/registerU/registered', [LoginController::class, 'register'])->name('registerU.registered');
#Rutas para Jefe
Route::group(['middleware' => ['role:Jefe']], function(){
    #Formularios
    Route::get('/registerD', [DepartamentosCont::class, 'create'])->middleware('auth')->name('registerD');
    #Consultas
    Route::get('/consDepart', [DepartamentosCont::class, 'index'])->middleware('auth')->name('consDepart');
    Route::get('/consUser', [LoginController::class, 'users'])->middleware('auth')->name('consUser');
    #Formularios Envio
    Route::post('/registerD/saveD', [DepartamentosCont::class, 'store'])->middleware('auth')->name('registerD.saveD');
    Route::post('/startSesion', [LoginController::class, 'login'])->middleware('auth')->name('startSesion');
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

/*
Route::get('/register', function(){
    return Inertia::render('register');
})->middleware(['auth', 'verified'])->name('register1');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
*/
#Rutas tipo Post

