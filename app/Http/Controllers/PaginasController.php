<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\User;
use MOHA\Oferta;
use MOHA\Producto;
use MOHA\Demanda;
use Auth;

class PaginasController extends Controller
{
    public function index () {
		return view('index');
	}

	public function operadores () {
		$admin = User::where('admin', '=', 1)->first();
		$users = User::where('id', '!=', $admin->id)->orderBy('apellido', 'ASC')->get();
        return view('operadores', array('users' => $users));
	}

	public function precios () {
		return view('precios');
	}

	public function register2 () {
		return view('auth/register2');
	}
}

