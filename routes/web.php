<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');

/*
|--------------------------------------------------------------------------
| RUTAS GENERALES DEL SISTEMA
|--------------------------------------------------------------------------
*/

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


/*
|--------------------------------------------------------------------------
| RUTAS SOLO ADMINISTRADOR
|--------------------------------------------------------------------------
|
|  Estas rutas solo pueden ser accedidas por usuarios con rol "Administrador"
|  Middleware: ['auth', 'admin']
|
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::view('/admin/regions', 'admin.regions')
        ->name('admin.regions');

    Route::view('/admin/delegaciones', 'admin.delegaciones')
        ->name('admin.delegaciones');

    Route::view('/admin/usuarios', 'admin.usuarios')
        ->name('admin.usuarios');

    // Aquí irán los CRUD reales más adelante
});


/*
|--------------------------------------------------------------------------
| RUTAS SOLO COORDINADOR
|--------------------------------------------------------------------------
|
|  Rutas accesibles únicamente para el rol "Coordinador"
|  Middleware: ['auth', 'coordinador']
|
*/

Route::middleware(['auth', 'coordinador'])->group(function () {

    Route::view('/coordinador/panel', 'coordinador.panel')
        ->name('coordinador.panel');

    Route::view('/coordinador/delegaciones', 'coordinador.delegaciones')
        ->name('coordinador.delegaciones');
});


/*
|--------------------------------------------------------------------------
| RUTAS SOLO REPRESENTANTE
|--------------------------------------------------------------------------
|
|  Rutas accesibles únicamente para el rol "Representante"
|  Middleware: ['auth', 'representante']
|
*/

Route::middleware(['auth', 'representante'])->group(function () {

    Route::view('/representante/comite', 'representante.comite')
        ->name('representante.comite');

    Route::view('/representante/perfil', 'representante.perfil')
        ->name('representante.perfil');
});


/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
