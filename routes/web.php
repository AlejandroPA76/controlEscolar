<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});

// esta es la nueva ruta que usaremos
Route::get('administrativo', 'AdministrativoController@index')->name('administrativo');

Route::get('menu/directora', function () {
    return view('directora.menuDirectora');
}); 

Route::get('/directora/estudiantes', function () {
    return view('directora.estudiantes');
})->name('directoraEstudiantes');

Route::get('/directora/tutores', function () {
    return view('directora.tutores');
})->name('directoraTutores');

Route::get('/directora/registrar/tutores', function () {
    return view('directora.registrarTutores');
})->name('directoraRegistrarTutores');

Route::get('directora/agregar/alumno', function () {
    return view('directora.agregarAlumno');
})->name('directoraAgregarAlumno');


Route::get('directora/crear/grupo', function () {
    return view('directora.crearGrupo');
})->name('directoraCrearGrupo');

Route::get('directora/docentes', function () {
    return view('directora.docentes');
})->name('directora.directoraDocentes');

Route::get('directora/registrar/docentes', function () {
    return view('directora.registrarDocentes');
})->name('directora.registrarDocentes');


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