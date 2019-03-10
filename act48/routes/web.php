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
//Act38
//Cambiamos las rutas para que vayan por el controlador:
Route::get('/', 'HomeController@getHome');
Route::get('catalog', 'CatalogController@getIndex')->name('catalog');
Route::get('catalog/show/{id}', 'CatalogController@getShow')->name('catalogShow');
Route::get('catalog/create', 'CatalogController@getCreate');
Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
//Act42
//Comentamos esta ruta, ya que se sustituye por Auth::routes(),
// que crea todas las rutas de autenticacion
//Route::view('auth/login', 'auth.login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Act43
Route::post('catalog/create', 'CatalogController@postCreate');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
Route::delete('catalog/delete/{id}', 'CatalogController@putDelete');

//Act45 ruta Mail
Route::get('sendhtmlemail','MailController@html_email');

//Act46 Cookies
Route::get('personalizacion', 'PersonalizacionController@personalizar');
Route::post('personalizacion', 'PersonalizacionController@guardarpersonalizacion');

//Act46 Cookies Idioma
//Act48 Comentamos esta ruta y editamos el metodo guardaidioma
//Route::get('idioma', 'IdiomaController@idioma');
Route::post('idioma', 'IdiomaController@guardaridioma');

//Act37
/*
Route::get('/', function () {
    return view('home');
});

Route::get('/fecha', function () {
    return view('fecha',
      ['day' => date('d'),
      'month' => date('m'),
      'year' => date('Y')]);
});

Route::view('auth/login', 'auth.login');
Route::view('catalog', 'catalog.index');
Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id' =>$id));
});
Route::view('catalog/create', 'catalog.create');
Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id' =>$id));
});
*/
