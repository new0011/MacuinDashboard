<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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
/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

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
Route::get('/consDepart', function () {
    return view('/consDepart');
})->name('consDepart');

Route::get('/consUser', function () {
    return view('/consUser');
})->name('consUser');

Route::get('/asigAuxiliar', function () {
    return view('/asigAuxiliar');
})->name('asigAuxiliar');

Route::get('/controlTickets', function () {
    return view('controlTickets');
})->name('control');

Route::get('/report', function () {
    return view('report');
})->name('report');

Route::get('/registerU', function (){
    return view('/registerU');
})->name('registerU');

Route::get('/registerD', function (){
    return view('/registerD');
})->name('registerD');