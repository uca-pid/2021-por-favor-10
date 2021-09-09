<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clasesCargadas', [App\Http\Controllers\HomeController::class, 'clasesCargadas'])->name('clasesCargadas');
Route::get('/clases', [App\Http\Controllers\HomeController::class, 'clases'])->name('clases');
Route::post('/cargarClase', [App\Http\Controllers\HomeController::class, 'cargarClase'])->name('cargarClase');

// Route::get('/coverage', function () {
//     return asset('coverage/index.html');
// });