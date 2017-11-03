<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Operacion;
use MOHA\User;
use Auth;
use Session;

class OperacionesController extends Controller
{
    public function misoperaciones() {

    	$id = Auth::user()->id;
    	$operaciones = Operacion::leftjoin('ofertas','operaciones.id_oferta', '=', 'ofertas.id')
    					->where('ofertas.id_op', '=', $id)->orderBy('operaciones.fecha', 'DSC')->get(['operaciones.*']);

    	return view('usuario/operaciones', array('operaciones' => $operaciones));

    }

     public function listaroperaciones() {

    	$operaciones = Operacion::orderBy('fecha', 'DSC')->get();

    	return view('operaciones', array('operaciones' => $operaciones));

    }
}
