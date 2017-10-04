<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
		return view('ofertas');
	}

	public function demandas () {
		return view('demandas');
	}

	public function precios () {
		return view('precios');
	}
}
