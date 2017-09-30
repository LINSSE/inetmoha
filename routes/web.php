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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'PaginasController@index');
Route::get('ofertas', 'PaginasController@ofertas');
Route::get('precios', 'PaginasController@precios');
Route::get('demandas', 'PaginasController@demandas');
Route::get('operaciones', 'PaginasController@operaciones');
Route::get('operadores', 'PaginasController@operadores');


// Para proteger una clausula:
// Route::get('admin/catalog', function() {
// Solo se permite el acceso a usuarios autenticados
// })->middleware('auth');
// Para proteger una acción de un controlador:
// Route::get('profile', 'ProfileController@show')->middleware('auth');


// Para proteger acceso a grupo de rutas
// Route::group(['middleware' => 'auth'], function() {
// Route::get('catalog', 'CatalogController@getIndex');
// Route::get('catalog/create', 'CatalogController@getCreate');
// // ...
// });
