<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function index () {
		return view('index');
	}

	public function operadores () {
		return view('operadores');
	}

	public function operaciones () {
		return view('operaciones');
	}

	public function ofertas () {
		return view('ofertas');
	}

	public function demandas () {
		return view('demandas');
	}

	public function precios () {
		return view('precios');
	}
}
