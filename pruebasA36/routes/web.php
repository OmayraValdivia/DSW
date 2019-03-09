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

Route::get('optional/{param?}', function ($param = null) {
	if (isset($param)){
		return "Con parámetro opcional: $param";
	}else{
		return "No hay parámetro opcional.";
	}
});

Route::get('defecto/{param?}', function ($param = 'por defecto'){ 
	return "Parámetro $param";
});

Route::post('post', function (){ 
	return "Ruta por post";
});

Route::match(['get','post'], 'igual', function(){
	return "Igual para get o post.";
});

Route::get('numero/{num}', function ($num){ 
	return "Se ha comprobado que el parametro es sólo numérico: $num";
})->where('num','[0-9]+');

Route::get('comprobar/{text}/{num}', function ($text,$num){ 
	return "Comprobado <br>Primer parámetro es sólo texto: $text".
	"<br>Segundo parámetro es sólo números: $num";
})->where(['text'=>'[a-z]+', 'num'=>'[0-9]+']);

