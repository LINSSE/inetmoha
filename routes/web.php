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


//Rutas Publicas
Route::get('/index', 'PaginasController@index');
Route::get('ofertas', 'PaginasController@ofertas');
Route::get('precios', 'PaginasController@precios');
Route::get('demandas', 'PaginasController@demandas');
Route::get('operaciones', 'PaginasController@operaciones');
Route::get('operadores', 'PaginasController@operadores');
Route::get('email/nuevoOperador', 'AdminController@enviarMail');
Route::get('ciudades/{id}', 'ProvinciasController@getCiudades');
Route::post('despachante/store', 'DespachanteController@store');
Route::post('representante/store', 'RepresentanteController@store');


//Rutas para usuruarios autenticados
Route::group(['middleware' => 'auth'], function() {

	Route::get('usuario/index', 'UserController@index');
	Route::get('usuario/show/{id}', 'UserController@show');
	Route::get('usuario/edit/{id}', 'UserController@edit');
	Route::get('usuario/update/{id}', 'UserController@update');
	Route::get('usuario/ofertas', 'UserController@ofertas');
	Route::get('usuario/demandas', 'UserController@demandas');
	Route::get('usuario/operaciones', 'UserController@operaciones');
});


//Rutas de Administrador
Route::group(['middleware' => 'admin'], function() {

	Route::get('admin/principal', 'AdminController@index');
	Route::get('admin/operadores', 'AdminController@listarOperadores');
	Route::get('admin/ofertas', 'AdminController@ofertas');
	Route::get('admin/demandas', 'AdminController@demandas');
	Route::get('admin/productos', 'AdminController@productos');
	Route::get('admin/operaciones', 'AdminController@operaciones');
	Route::post('admin/activar/{id}', 'AdminController@activar');
	Route::post('admin/desactivar/{id}', 'AdminController@desactivar');
	Route::get('admin/despachantes', 'AdminController@despachantes');
	Route::get('admin/representantes', 'AdminController@representantes');
	Route::post('producto/store', 'ProductoController@store');
	Route::post('producto/eliminar', 'ProductoController@eliminar');
	Route::post('admin/reasignar', 'AdminController@reasignar');
	Route::post('admin/despachante/eliminar', 'AdminController@eliminarDesp');
		
});


//Rutas de pruebas
Route::get('test', function()
{
    //dd(Config::get('mail'));
	
});

Route::get('prueba', 'AdminController@descargarZIP');


?>