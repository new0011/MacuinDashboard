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
#Rutas tipo get
#Formularios
Route::get('/', [LoginController::class, 'getLogin'])->name('login');
Route::get('/registerU', [LoginController::class, 'datesSelect'])->name('registerU');
Route::get('/registerD', [DepartamentosCont::class, 'create'])->name('registerD');
#Auth
Route::post('/logear', [LoginController::class, 'login'])->name('logear');
#Consultas
Route::get('/consDepart', [DepartamentosCont::class, 'index'])->name('consDepart');
Route::get('/consUser', [LoginController::class, 'users'])->name('consUser');

Route::get('/asigAuxiliar', function () {
    return view('/asigAuxiliar');
})->name('asigAuxiliar');

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
Route::post('/registerU/registered', [LoginController::class, 'register'])->name('registerU.registered');
Route::post('/registerD/saveD', [DepartamentosCont::class, 'store'])->name('registerD.saveD');
Route::post('/startSesion', [LoginController::class, 'login'])->name('startSesion');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
