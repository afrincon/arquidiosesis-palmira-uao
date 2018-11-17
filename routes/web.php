<?php

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
    return redirect()->route('login');
});

#Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*normal routes*/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios/obtenerlistadousuarios', 'UsuarioController@obtenerListadoUsuarios');
Route::get('/usuarios/obtenerlistadoroles', 'UsuarioController@obtenerListadoRoles');
Route::get('/usuarios/obtenerlistadoparrocos', 'UsuarioController@obtenerParrocos');
Route::get('/iglesias/obtenerlistadoiglesias', 'IglesiaController@obtenerIglesias');
Route::get('/iglesias/obtenertilesiglesias', 'IglesiaController@tilesIglesias');
Route::get('/iglesias/obtenerlistadodiocesis', 'IglesiaController@obtenerDiocesis');
Route::get('/iglesias/obtenerlistadoayudas/{id}', 'IglesiaController@obtenerAyudas');
Route::get('/beneficiarios/obtenerlistadobeneficiarios', 'BeneficiarioController@obtenerBeneficiarios');
Route::get('/beneficiarios/obtenertilesbeneficiarios', 'BeneficiarioController@tilesBeneficiarios');
Route::get('/beneficiarios/obtenerlistadotiposdoc', 'BeneficiarioController@obtenerTipoDocumento');
Route::get('/beneficiarios/validardireccion', 'BeneficiarioController@validarDireccion');
Route::get('/ayudas/validarayuda', 'AyudaController@validarUltimaAyuda');
Route::get('/ayudas/obtenerlistadoayudas', 'AyudaController@obtenerAyudas');
Route::get('/ayudas/obtenertilesayudas', 'AyudaController@obtenerTilesAyudas');
Route::get('/ayudas/obtenertiposayudas', 'AyudaController@obtenerTipoAyuda');
Route::get('/reportes/reporteporiglesia', 'ReporteController@reporteIglesia');
Route::get('/reportes/reporteporbeneficiario', 'ReporteController@reporteBeneficiario');
Route::get('/reportes/generarreporte', 'ReporteController@listadoIglesias')->name('reporte-iglesia');
Route::get('/reportes/generarreporteb', 'ReporteController@listadoBeneficiarios')->name('reporte-beneficiario');

Route::resource('/usuarios', 'UsuarioController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin');

Route::resource('/iglesias', 'IglesiaController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin, user');

Route::resource('/beneficiarios', 'BeneficiarioController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin, user');

Route::resource('/ayudas', 'AyudaController')->middleware('auth', 'role:admin, user');
    