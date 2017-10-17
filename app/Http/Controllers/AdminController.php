<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Provincia;
use App\Despachante;
use App\Representante;
use Illuminate\Support\Facades\Auth;
use App\Producto;

class AdminController extends Controller
{
    
    public function index(){
    	return view('/admin/principal');
    }

    public function listarOperadores(){
    	$users = User::All()->except(Auth::id());        
        $despachantes = Despachante::All();
        $representantes = Representante::All();
        $provincias = Provincia::All();
        $ciudades = Ciudad::All();

    	return view('/admin/operadores', array('users' => $users, 'despachantes' => $despachantes, 'representantes' => $representantes, 'provincias' => $provincias, 'ciudades' => $ciudades));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar($id)
    {
        $user = User::FindOrFail($id);
        $user->activo = 1;
        $user->save();
        return redirect('admin/operadores');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivar($id)
    {
        $user = User::FindOrFail($id);
        $user->activo = 0;
        $user->save();
        return redirect('admin/operadores');

    }

    public function reasignar(Request $request)
    {
        $id = $request->id;
        $user = User::FindOrFail($id);
        $user->id_des = $request->id_des;
        $user->save();
        return redirect('admin/operadores');
    }

    public function eliminarDesp(Request $request)
    {
        $id_ant = $request->id; //id del Despachante a Eliminar
        $id_nuevo = $request->id_des; //id del Despachante de reemplazo
        $rows = User::where('id_des', '=', $id_ant)->update(['id_des' => $id_nuevo]);
        $desp = Despachante::destroy($id_ant);
        
        return redirect('admin/despachantes');
    }

    public function despachantes() {
        $despachantes = Despachante::orderBy('apellido', 'ASC')->get();
        return view('admin/despachantes', array('despachantes' => $despachantes));
    }

    public function representantes() {
        $representantes = Representante::orderBy('apellido', 'ASC')->get();
        return view('admin/representantes', array('representantes' => $representantes));
    }

    public function productos(){
    	
        $productos = Producto::orderBy('descripcion', 'ASC')->get();
    	return view('admin/productos', array('productos' => $productos));
    }

    public function operaciones(){
    	
    	return view('admin/operaciones');
    }

    public function nuevoOperador() {
        return view('admin/nuevoOperador');
    }

    public function enviarMail() {
       $this->call('GET','email/nuevoOperador');
        return View('email/nuevoOperador');
    }
}
