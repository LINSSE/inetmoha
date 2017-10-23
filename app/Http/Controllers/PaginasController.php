<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Oferta;
use App\Producto;

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
		return view('ofertas', array('ofertas' => $ofertas, 'productos' => $productos));
	}

	public function demandas () {
		return view('demandas');
	}

	public function precios () {
		return view('precios');
	}
}
