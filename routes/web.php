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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/iglesias', 'IglesiaController',
        ['except' => ['destroy']]);

Route::resource('/usuarios', 'UsuarioController',
    ['except' => ['destroy']]);

Route::get('/validar/{$id}','AyudaController@validarFecha');

Route::resource('/ayudas', 'AyudaController',
    ['except' => ['destroy']]);

Route::resource('/beneficiarios', 'BeneficiarioController',
    ['except' => ['destroy']]);