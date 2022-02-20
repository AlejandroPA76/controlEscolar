<?php

use App\Http\Controllers\PagoController;
use App\Http\Controllers\TutorControlller;
use App\Models\Administrativo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');


// ---------------------------------------------------------------------------------
Route::get('panel/index', 'AdministrativoController@index')->name('panel.index');
// ----------------------------------------------------------------------------------

Route::get('admin/index/tutores', 'TutorController@index')->name('admin.indexTutores');

Route::get('admin/created/tutores', 'TutorController@create')->name('admin.createdTutores');

Route::post('admin/store/tutores', 'TutorController@store')->name('admin.storeTutores');

Route::get('admin/show-tutor/{tutor}', 'TutorController@show')->name('admin.showTutores');

Route::get('admin/edit-tutor/{tutor}', 'TutorController@edit')->name('admin.editTutores');

Route::put('admin/tutores/{tutor}/update', 'TutorController@update')->name('admin.updateTutores');

Route::delete('admin/tutores/destroy/{tutor}', 'TutorController@destroy')->name('admin.destroyTutores');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/index/estudiantes', 'EstudianteController@index')->name('admin.indexEstudiantes');

Route::post('admin/index/estudiantes/{estudiante}', 'EstudianteController@store')->name('subir.foto');

Route::get('admin/created/estudiantes', 'EstudianteController@create')->name('admin.createdEstudiantes');

// Route::post('admin/store/estudiantes', 'EstudianteController@store')->name('admin.storeEstudiantes');

Route::get('admin/show-estudiantes/{estudiante}', 'EstudianteController@show')->name('admin.showEstudiantes');

Route::get('admin/edit-estudiantes/{estudiante}', 'EstudianteController@edit')->name('admin.editEstudiantes');

Route::put('admin/estudiantes/{estudiante}/update', 'EstudianteController@update')->name('admin.updateEstudiantes');

Route::delete('admin/estudiantes/destroy/{estudiante}', 'EstudianteController@destroy')->name('admin.destroyEstudiantes');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/index/docentes', 'DocenteController@index')->name('admin.indexDocentes');

Route::get('admin/created/docentes', 'DocenteController@create')->name('admin.createdDocentes');

Route::post('admin/store/docentes', 'DocenteController@store')->name('admin.storeDocentes');

Route::get('admin/show-docentes/{docentes}', 'DocenteController@show')->name('admin.showDocentes');

Route::get('admin/edit-docentes/{docentes}', 'DocenteController@edit')->name('admin.editDocentes');

Route::put('admin/docentes/{docentes}/update', 'DocenteController@update')->name('admin.updateDocentes');

Route::delete('admin/docentes/destroy/{docentes}', 'DocenteController@destroy')->name('admin.destroyDocentes');
// ----------------------------------------------------------------------------------------------------------------

Route::resource('grupos', GrupoController::class);
Route::resource('niveles', NivelController::class);
Route::resource('ciclos', CicloEscolarController::class);
//Route::resource('pagos', PlataformaPagoController::class);
// Route::resource('imagenes', ImagenController::class);

Route::post('admin/estudiantes/{estudiante}', 'ImagenController@store')->name('imagenes.store');

Route::get('grupos/asignar/{grupo}', 'GrupoController@asignar')->name('grupos.asignar');
Route::post('grupos/asignar/alumno', 'GrupoController@asignaralumno')->name('grupos.asignaralumno');

// ---------------------------------------------------------------------------

Route::get('menu/contador', function () {
    return view('contador.menuContador');
})->name('menuContador');

Route::get('menu/contador/historial/Pagos', function () {
    return view('contador.historialDePagos');
})->name('menuContadorHistorialDePagos');

Route::get('menu/contador/historial/Pagos/recientes', function () {
    return view('contador.historialDePagosReciente');
})->name('menuContadorHistorialDePagosReciente');

Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);

// Route::get('permissions', 'PermissionController@edit')->name('permissions.edit');
// Route::put('permissions/update/{permission}', 'PermissionController@update')->name('permissions.update');
// Route::delete('permissions/delete/{permission}', 'PermissionController@destroy')->name('permissions.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pagos/menu',[App\Http\Controllers\PagoController::class, 'index'])->name('pagos.index');

Route::post('/pagos/registrar',[App\Http\Controllers\PagoController::class, 'store'])->name('pagos.store');

Route::post('pagar/confirmar',[App\Http\Controllers\PagoController::class, 'payment'])->name('pagar.a');

Route::get('pagar/aprovado',[App\Http\Controllers\PagoController::class, 'success'])->name('pagar.b');

Route::get('pagar/rechazado',[App\Http\Controllers\PagoController::class, 'fail'])->name('rechazado.a');

Route::get('admin/historial/pagos',[App\Http\Controllers\ContadorController::class, 'historialPagos'])->name('historialPagos');

Route::get('admin/historial/pagos/ver/{id}',[App\Http\Controllers\ContadorController::class, 'show'])->name('verPago');


//////////////////docente observaciones/////////////////////////////

Route::get('grupo/asignado',[App\Http\Controllers\ObservacionController::class, 'index'])->name('docente.grupo_asignados');

Route::get('grupo/asignado/lista/{id}',[App\Http\Controllers\ObservacionController::class, 'showList'])->name('docente.grupo_asignados_estudiantes');

Route::get('grupo/asignado/lista/enviar/{id}',[App\Http\Controllers\ObservacionController::class, 'showFormObservacion'])->name('docente.grupo_asignados_estudiantes_enviar');

Route::post('grupo/asignado/lista/send',[App\Http\Controllers\ObservacionController::class, 'sendMensaje'])->name('docente.grupo_asignados_estudiantes_send');

Route::get('grupo/asignado/lista/estudiante/observacion/{id}',[App\Http\Controllers\ObservacionController::class, 'showObservacionEstudiante'])->name('docente.grupo_asignados_observacion_estudiante');

Route::delete('grupo/asignado/lista/estudiante/dar/baja/{id}',[App\Http\Controllers\ListaGrupoController::class, 'destroy'])->name('baja.estudiante');

Route::get('/mispagos',[App\Http\Controllers\TutorController::class, 'misPagos'])->name('tutor.mispagos');

Route::get('administrativo/pagar-en-efectivo', function () {
    return view('administrativo.pagos.pagosEfectivo');
})->name('pagar.efectivo');