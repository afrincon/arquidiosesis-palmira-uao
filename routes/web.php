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

Route::get('/inicio', 'MainController@index')->name('inicio');

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

#Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ayudas/validar', 'AyudaController@validarFecha');

Route::get('/beneficiarios/validar', 'BeneficiarioController@validarDireccion');

Route::get('/iglesias/informacion', 'IglesiaController@searchChurch');
Route::get('/usuarios/informacion', 'UsuarioController@searchUser');
Route::get('/beneficiarios/informacion', 'BeneficiarioController@searchBeneficiarios');
Route::get('/obtenerparrocos', 'UsuarioController@getUsuarios');
Route::get('descargar-ayudas', 'AyudaController@pdfAyudas')->name('ayudas.pdf');


Route::resource('/iglesias', 'IglesiaController',
        ['except' => ['destroy']]);

Route::resource('/usuarios', 'UsuarioController',
    ['except' => ['destroy']])->middleware('auth', 'role:admin');;

Route::resource('/ayudas', 'AyudaController',
    ['except' => ['destroy']]);

Route::resource('/beneficiarios', 'BeneficiarioController',
    ['except' => ['destroy']]);

   