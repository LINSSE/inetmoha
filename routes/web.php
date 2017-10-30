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
	Route::get('usuario/ofertas', 'OfertasController@ofertas');
	Route::post('usuario/nuevaOferta', 'OfertasController@store');
	Route::post('usuario/eliminarOferta', 'OfertasController@eliminar');
	Route::get('usuario/demandas', 'DemandasController@demandas');
	Route::post('usuario/nuevaDemanda', 'DemandasController@store');
	Route::post('usuario/eliminarDemanda', 'DemandasController@eliminar');
	Route::get('usuario/operaciones', 'UserController@operaciones');
	Route::get('usuario/buscarOfertas', 'OfertasController@buscarOfertas');
	Route::get('usuario/buscarDemandas', 'DemandasController@buscarDemandas');
});


//Rutas de Administrador
Route::group(['middleware' => 'admin'], function() {

	Route::get('admin/principal', 'AdminController@index');

	//Rutas de Administrador con Respecto a Operadores
	Route::post('admin/activar/{id}', 'AdminController@activar');
	Route::post('admin/desactivar/{id}', 'AdminController@desactivar');
	Route::post('admin/reasignar', 'AdminController@reasignar');
	Route::get('admin/buscarOperadores', 'UserController@buscarOperadores');

	Route::get('admin/operadores', 'AdminController@listarOperadores');
	Route::get('admin/ofertas', 'AdminController@ofertas');
	Route::get('admin/demandas', 'AdminController@demandas');
	Route::get('admin/productos', 'AdminController@productos');
	Route::get('admin/operaciones', 'AdminController@operaciones');
		
	//Rutas de Administrador con Respecto a Productos
	Route::get('admin/representantes', 'AdminController@representantes');

	//Rutas de Administrador con Respecto a Productos
	Route::post('producto/store', 'ProductoController@store');
	Route::post('producto/eliminar', 'ProductoController@eliminar');
	
	//Rutas de Administrador con Respecto a Despachantes
	Route::post('admin/despachante/eliminar', 'DespachanteController@eliminarDesp');
	Route::get('admin/buscarDespachantes', 'DespachanteController@buscarDesp');
	Route::get('admin/despachantes', 'DespachanteController@despachantes');	
});

//Route::get('preciosba', 'ProductoController@preciosba');
Route::get('url', 'UrlController@showResults');

//Rutas de pruebas


Route::get('prueba', function(){
	return view('prueba');
});


?>