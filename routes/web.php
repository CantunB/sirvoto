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


Auth::routes(['verify' => true ]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');



Route::resource('electores', 'ElectoresController')->middleware('verified');
Route::resource('secciones', 'SeccionesController')->middleware('verified');
Route::resource('rs', 'ResponsableSeccionController')->middleware('verified');
Route::resource('rm', 'ResponsableManzanaController')->middleware('verified');
Route::resource('anfitriones', 'AnfitrionesController')->middleware('verified');
Route::resource('simpatizantes', 'SimpatizantesController')->middleware('verified');
Route::resource('permisos', 'PermissionsController')->middleware('verified');
Route::resource('roles', 'RolesController')->middleware('verified');
Route::resource('usuarios-roles', 'UsuariosRoles')->middleware('verified');
Route::resource('usuarios', 'UserController')->middleware('verified');

Route::post('rm/seccion', 'ResponsableManzanaController@getManzanas')->name('rm.getManzanas');
Route::post('rm/sec_man', 'ResponsableManzanaController@getSecMan')->name('rm.getSecMan');

Route::post('rs/sec_man', 'ResponsableSeccionController@getSecMan')->name('rs.getSecMan');
Route::post('rs/getResponsable', 'ResponsableSeccionController@getSecMan')->name('rs.getResponsable');

Route::post('anfitriones/sec_man', 'AnfitrionesController@getSecMan')->name('anfitriones.getSecMan');

Route::post('simpatizantes/sec_man', 'SimpatizantesController@getSecMan')->name('simpatizantes.getSecMan');
//Route::get('rm/{seccion}', 'ResponsableManzanaController@getManzanas')->name('rm.getManzanas');
