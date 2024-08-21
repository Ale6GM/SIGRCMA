<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TrabajoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/about', function () {
    return view('about');
});

/**
 * Auth Routes
 */
Auth::routes(['verify' => false]);


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::middleware('auth')->group(function () {
        /**
         * Home Routes
         */
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::resource('clientes', ClienteController::class)->names('admin.clientes');
        Route::resource('establecimientos', EstablecimientoController::class)->names('admin.establecimientos');
        Route::resource('tecnicos', TecnicoController::class)->names('admin.tecnicos');
        Route::resource('reportes', ReporteController::class)->names('admin.reportes');
        Route::resource('trabajos', TrabajoController::class)->names('admin.trabajos');
        Route::resource('estadisticas', EstadisticaController::class)->names('admin.estadisticas');

        /* Rutas de Exportacion Globales */

        Route::get('exportar_clientes', [ClienteController::class, 'exportarCliente'])->name('exportar_clientes');
        Route::get('exportar_locales', [EstablecimientoController::class, 'exportarLocal'])->name('exportar_locales');
        Route::get('exportar_reportes', [ReporteController::class, 'exportarReportes'])->name('exportar_reportes');
        /**
         * 
         * Role Routes
         */    
        Route::resource('roles', RolesController::class);
        /**
         * Permission Routes
         */    
        Route::resource('permissions', PermissionsController::class);
        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });
    });
});
