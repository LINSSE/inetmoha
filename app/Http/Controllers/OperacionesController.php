<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Operacionoferta;
use MOHA\User;
use Auth;
use Session;

class OperacionesController extends Controller
{
    public function misoperaciones() {

    	$id = Auth::user()->id;
    	/*$operaciones = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')->where('contraofertas.id_comprador', '=', $id)->orderBy('operacionofertas.fecha', 'DSC')
                        ->get(['operacionofertas.*']);*/

        $operaciones = Operacionoferta::leftJoin('ofertas', 'operacionofertas.id_contra', '=', 'ofertas.id')->where('ofertas.id_op', '=', $id)->orderBy('operacionofertas.fecha', 'DSC')
                        ->get(['operacionofertas.*']);

    	return view('usuario/operaciones', array('operaciones' => $operaciones));

    }

     public function listaroperaciones() {

    	$operaciones = Operacionoferta::orderBy('fecha', 'DSC')->get();

    	return view('operaciones', array('operaciones' => $operaciones));

    }
}
