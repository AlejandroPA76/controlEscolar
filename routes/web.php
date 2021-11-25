<?php

use App\Http\Controllers\TutorControlller;
use App\Models\Administrativo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('menu/index', 'AdministrativoController@index')->name('admin.index');
// ----------------------------------------------------------------------------------

Route::get('admin/index/tutores', 'TutorController@index')->name('admin.indexTutores');

Route::get('admin/created/tutores', 'TutorController@create')->name('admin.createdTutores');

Route::post('admin/store/tutores', 'TutorController@store')->name('admin.storeTutores');

Route::get('admin/show/{tutor}', 'TutorController@show')->name('admin.showTutores');

Route::get('admin/edit/{tutor}', 'TutorController@edit')->name('admin.editTutores');

Route::put('admin/{tutor}/update', 'TutorController@update')->name('admin.updateTutores');

Route::delete('admin/destroy/{tutor}', 'TutorController@destroy')->name('admin.destroyTutores');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/index/estudiantes', 'EstudianteController@index')->name('admin.indexEstudiantes');

Route::get('admin/created/estudiantes', 'EstudianteController@create')->name('admin.createdEstudiantes');

Route::post('admin/store/estudiantes', 'EstudianteController@store')->name('admin.storeEstudiantes');

Route::get('admin/show/{estudiante}', 'EstudianteController@show')->name('admin.showEstudiantes');

Route::get('admin/edit/estudiantes', 'EstudianteController@edit')->name('admin.editEstudiantes');

Route::put('admin/{estudiantes}/update', 'EstudianteController@update')->name('admin.updateEstudiantes');

Route::delete('admin/destroy/{estudiante}', 'EstudianteController@destroy')->name('admin.destroyEstudiantes');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/index/docentes', 'DocenteController@index')->name('admin.indexDocente');

Route::get('admin/created/docentes', 'DocenteController@create')->name('admin.createdDocente');

Route::post('admin/store/docentes', 'DocenteController@store')->name('admin.storeDocente');

Route::get('admin/show/{docentes}', 'DocenteController@show')->name('admin.showDocente');

Route::get('admin/edit/docentes', 'DocenteController@edit')->name('admin.editDocente');

Route::put('admin/{docentes}/update', 'DocenteController@update')->name('admin.updateDocente');

Route::delete('admin/destroy/{docentes}', 'DocenteController@destroy')->name('admin.destroyDocente');
// ----------------------------------------------------------------------------------------------------------------

Route::get('admin/crear/grupo', function () {
    return view('administrativo.crearGrupo');
})->name('admin.crearGrupo');

Route::get('admin/docentes', function () {
    return view('administrativo.docentes');
})->name('admin.indexDocentes');

Route::get('admin/registrar/docentes', function () {
    return view('administrativo.registrarDocentes');
})->name('admin.registrarDocentes');


Route::get('menu/docente', function () {
    return view('docente.menuDocente');
})->name('menuDocente');

Route::get('menu/tutor', function () {
    return view('tutor.menuTutor');
})->name('menuTutor');

Route::get('menu/tutor/observaciones', function () {
    return view('tutor.observaciones');
})->name('menuTutorObservaciones');

Route::get('menu/contador', function () {
    return view('contador.menuContador');
})->name('menuContador');

Route::get('menu/contador/historial/Pagos', function () {
    return view('contador.historialDePagos');
})->name('menuContadorHistorialDePagos');

Route::get('menu/contador/historial/Pagos/recientes', function () {
    return view('contador.historialDePagosReciente');
})->name('menuContadorHistorialDePagosReciente');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
