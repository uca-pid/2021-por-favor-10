<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/landing', [App\Http\Controllers\HomeController::class, 'landing']);
Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil');
Route::get('/modificar', [App\Http\Controllers\HomeController::class, 'modificar'])->name('modificar');
Route::get('/modificar/{id}', [App\Http\Controllers\HomeController::class, 'modificarClase'])->name('modificarClase');
Route::get('/borrar/{id}', [App\Http\Controllers\HomeController::class, 'borrarClase'])->name('borrarClase');
Route::post('/generarCambios', [App\Http\Controllers\HomeController::class, 'generarCambios'])->name('generarCambios');


Route::get('/usuariosClases', [App\Http\Controllers\HomeController::class, 'usuariosClases'])->name('usuariosClases');
Route::get('/estadisticasClases', [App\Http\Controllers\HomeController::class, 'estadisticasClases'])->name('estadisticasClases');
Route::get('/estadisticasClases/{clase}', [App\Http\Controllers\ApiController::class, 'apiFetchCantUsersInClases'])->name('cantUsersClase');
Route::get('/estadisticasUsers/{user}', [App\Http\Controllers\ApiController::class, 'apiFetchUsersInClases'])->name('usersInClase');
Route::post('/agregarUsuariosClases', [App\Http\Controllers\HomeController::class, 'agregarUsuariosClases'])->name('agregarUsuariosClases');

Auth::routes(['verify' => true]);



Route::get('/clasesCargadas', [App\Http\Controllers\HomeController::class, 'clasesCargadas'])->name('clasesCargadas');
Route::get('/clases', [App\Http\Controllers\HomeController::class, 'clases'])->name('clases');
Route::post('/cargarClase', [App\Http\Controllers\HomeController::class, 'cargarClase'])->name('cargarClase');

Route::get('/rutinas', [App\Http\Controllers\RutinasController::class, 'rutinas'])->name('rutinas');
Route::post('/rutinas', [App\Http\Controllers\RutinasController::class, 'crearRutina'])->name('rutina_crear');
Route::get('/rutina/{id}', [App\Http\Controllers\RutinasController::class, 'detalleRutina'])->name('rutina_detalle');
Route::post('/rutina/{id}', [App\Http\Controllers\RutinasController::class, 'editarRutina'])->name('rutina_editar');
Route::get('/rutinaCliente', [App\Http\Controllers\RutinasController::class, 'rutinaCliente'])->name('rutinaCliente');
Route::post('/agregarClienteRutina', [App\Http\Controllers\RutinasController::class, 'agregarClienteRutina'])->name('agregarClienteRutina');

Route::get('/ejercicios', [App\Http\Controllers\EjercicioController::class, 'ejercicios'])->name('ejercicios');
Route::post('/ejercicios', [App\Http\Controllers\EjercicioController::class, 'crearEjercicio'])->name('ejercicio_crear');

Route::get('/recursoclases', [App\Http\Controllers\RecursoController::class, 'recursoclases'])->name('recursoclases');
Route::post('/crearRecursoClase', [App\Http\Controllers\RecursoController::class, 'crearRecursoClase'])->name('crearRecursoClase');
Route::post('/agregarClaseRecurso', [App\Http\Controllers\RecursoController::class, 'agregarClaseRecurso'])->name('agregarClaseRecurso');

Route::get('/recursoejercicios', [App\Http\Controllers\RecursoController::class, 'recursoejercicios'])->name('recursoejercicios');
Route::post('/crearRecursoEjercicio', [App\Http\Controllers\RecursoController::class, 'crearRecursoEjercicio'])->name('crearRecursoEjercicio');
Route::post('/agregarEjercicioRecurso', [App\Http\Controllers\RecursoController::class, 'agregarEjercicioRecurso'])->name('agregarEjercicioRecurso');

Route::get('/estadisticasrecursos', [App\Http\Controllers\RecursoController::class, 'estadisticasrecursos'])->name('estadisticasrecursos');
Route::get('/borrarRecursos/{tipo}/{id}', [App\Http\Controllers\RecursoController::class, 'borrarRecursos'])->name('borrarRecursos');

Route::get('/coverage/', function () {
    return redirect('coverage/index.html');
});