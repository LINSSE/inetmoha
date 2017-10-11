<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Provincia;
use App\Despachante;
use App\Representante;
use Illuminate\Support\Facades\Auth;

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

    public function despachantes() {
        $despachantes = Despachante::All();
        return view('admin/despachantes', array('despachantes' => $despachantes));
    }

    public function representantes() {
        $representantes = Representante::All();
        return view('admin/representantes', array('representantes' => $representantes));
    }

    public function productos(){
    	
    	return view('/admin/productos');
    }

    public function operaciones(){
    	
    	return view('/admin/operaciones');
    }

    public function nuevoOperador() {
        return view('admin/nuevoOperador');
    }

    public function enviarMail() {
       $this->call('GET','email/nuevoOperador');
        return View('email/nuevoOperador');
    }
}
