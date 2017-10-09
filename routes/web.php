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


Route::resource('representante', 'RepresentanteController');


Route::group(['middleware' => 'auth'], function() {

	Route::get('usuario/index', 'UserController@index');
	Route::get('usuario/show/{id}', 'UserController@show');
	Route::get('usuario/edit/{id}', 'UserController@edit');
	Route::get('usuario/update/{id}', 'UserController@update');
	Route::get('usuario/ofertas', 'UserController@ofertas');
	Route::get('usuario/demandas', 'UserController@demandas');
	Route::get('usuario/operaciones', 'UserController@operaciones');


	Route::get('admin/principal', 'AdminController@index');
	Route::get('admin/operadores', 'AdminController@listarOperadores');
	Route::get('admin/ofertas', 'AdminController@ofertas');
	Route::get('admin/demandas', 'AdminController@demandas');
	Route::get('admin/productos', 'AdminController@productos');
	Route::get('admin/operaciones', 'AdminController@operaciones');

});

Route::get('ciudades/{id}', 'ProvinciasController@getCiudades');


Route::post('despachante/store', 'DespachanteController@store');



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
?>