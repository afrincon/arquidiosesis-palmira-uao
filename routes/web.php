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

Route::resource('/usuarios', 'UsuarioController')->only([
    'index', 'create', 'store', 'edit', 'update'
]);

Route::resource('/ayudas', 'AyudaController')->only([
    'index', 'create', 'store', 'edit', 'update'
]);

Route::resource('/beneficiario', 'BeneficiarioController')->only([
    'index', 'create', 'store', 'edit', 'update'
]);