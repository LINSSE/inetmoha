<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\User;
use MOHA\Modo;
use MOHA\Cobro;
use MOHA\Puesto;
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

	public function cobros () {
		$cobros = Cobro::orderBy('descripcion', 'ASC')->get();
		return view('admin/datos/cobros', array('cobros' => $cobros));
	}

	public function modos () {
		$modos = Modo::orderBy('descripcion', 'ASC')->get();
		return view('admin/datos/modos', array('modos' => $modos));
	}

	public function puestos () {
		$puestos = Puesto::orderBy('descripcion', 'ASC')->get();
		return view('admin/datos/puestos', array('puestos' => $puestos));
	}
}

