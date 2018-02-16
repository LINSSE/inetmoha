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
Route::get('ofertas', 'OfertasController@ofertas');
Route::get('precios', 'PaginasController@precios');
Route::get('demandas', 'DemandasController@demandas');
Route::get('operaciones', 'OperacionesController@listaroperaciones');
//Route::get('operadores', 'PaginasController@operadores');
Route::get('email/nuevoOperador', 'AdminController@enviarMail');
Route::get('ciudades/{id}', 'ProvinciasController@getCiudades');


//Rutas para usuruarios autenticados
Route::group(['middleware' => 'auth'], function() {

	Route::get('usuario/index', 'UserController@index');
	Route::get('usuario/show/{id}', 'UserController@show');
	Route::get('usuario/edit/{id}', 'UserController@edit');
	Route::get('usuario/update/{id}', 'UserController@update');
	Route::get('usuario/ofertas', 'OfertasController@misofertas');
	Route::post('usuario/nuevaOferta', 'OfertasController@store');
	Route::post('usuario/eliminarOferta', 'OfertasController@eliminar');
	Route::get('usuario/demandas', 'DemandasController@misdemandas');
	Route::post('usuario/nuevaDemanda', 'DemandasController@store');
	Route::post('usuario/eliminarDemanda', 'DemandasController@eliminar');
	Route::get('usuario/operaciones', 'OperacionesController@misoperaciones');
	Route::get('usuario/buscarOfertas', 'OfertasController@buscarOfertas');
	Route::get('usuario/buscarDemandas', 'DemandasController@buscarDemandas');
	Route::post('usuario/editarPerfil', 'UserController@editarPerfil');
	Route::post('usuario/contraOferta', 'ContraofertaController@store');
	Route::get('usuario/detalleOferta/{id}', 'ContraofertaController@detalleOferta');
	Route::get('usuario/aceptarOferta/{id}', 'ContraofertaController@aceptarOferta');
	Route::get('usuario/rechazarOferta/{id}', 'ContraofertaController@rechazarOferta');
});


//Rutas de Administrador
Route::group(['middleware' => 'admin'], function() {

	//Route::get('admin/principal', 'AdminController@index');

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
		
	//Rutas de Administrador con Respecto a Datos
	Route::get('admin/cobros', 'PaginasController@cobros');
	Route::get('admin/puestos', 'PaginasController@puestos');
	Route::get('admin/modos', 'PaginasController@modos');
	Route::post('admin/puesto/store', 'ProductoController@storePuesto');
	Route::post('admin/modo/store', 'ProductoController@storeModo');
	Route::post('admin/cobro/store', 'ProductoController@storeCobro');

	//Rutas de Administrador con Respecto a Productos
	Route::post('producto/store', 'ProductoController@storeProd');
	Route::post('categoria/store', 'ProductoController@storeCat');
	Route::post('medida/store', 'ProductoController@storeMed');
	Route::post('producto/eliminar', 'ProductoController@eliminar');
	
	
});

//Route::get('preciosba', 'ProductoController@preciosba');

//Rutas de pruebas
use MOHA\User;

Route::get('pruebas', 'ContraofertaController@prueba');
Route::get('prueba', function(){
	$users = User::Find(4);
	return view('prueba', array('users' => $users));
});


?>