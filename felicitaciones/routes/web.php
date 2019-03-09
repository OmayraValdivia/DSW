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
    return "Pantalla principal";
});
Route::get('auth/login', function () {
    return "Login usuario";
});
Route::get('auth/logout', function () {
    return "Logout usuario";
});
Route::get('catalog', function () {
    return "Listado de clientes";
});
Route::get('catalog/show/{id}', function ($id) {
    return "Detalles del cliente ".$id;
});
Route::get('catalog/create', function () {
    return "Alta de un cliente";
});
Route::get('catalog/edit/{id}', function ($id) {
    return "Modifica los datos del cliente ".$id;
});
Route::get('catalog/delete/{id}', function ($id) {
    return "Elimina los datos del cliente ".$id;
});
