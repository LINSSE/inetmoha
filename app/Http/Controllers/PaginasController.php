<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Oferta;
use App\Producto;
use Auth;

class PaginasController extends Controller
{
    public function index () {
		return view('index');
	}

	public function operadores () {

		$users = User::All();
        return view('operadores', compact('users'));
	}

	public function operaciones () {
		return view('operaciones');
	}

	public function ofertas () {
		$ofertas = Oferta::All();
		$productos = Producto::All();
		if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activ = 0;
        }
		return view('ofertas', array('ofertas' => $ofertas, 'productos' => $productos, 'activo' => $activo));
	}

	public function demandas () {
		return view('demandas');
	}

	public function precios () {
		return view('precios');
	}
}

