<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Provincia;
use App\Despachante;
use App\Representante;

class AdminController extends Controller
{
    
    public function index(){
    	return view('/admin/principal');
    }

    public function listarOperadores(){
    	$users = User::All();
    	return view('/admin/operadores', array('users' => $users));
    }

    public function ofertas(){
    	
    	return view('/admin/ofertas');
    }

    public function demandas(){
    	
    	return view('/admin/demandas');
    }

    public function productos(){
    	
    	return view('/admin/productos');
    }

    public function operaciones(){
    	
    	return view('/admin/operaciones');
    }
}
