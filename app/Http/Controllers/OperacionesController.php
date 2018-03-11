<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Operacionoferta;
use MOHA\Operaciondemanda;
use MOHA\User;
use Auth;
use Session;

class OperacionesController extends Controller
{
    public function misoperaciones() {

    	$id = Auth::user()->id;
    	/*$operaciones = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')->where('contraofertas.id_comprador', '=', $id)->orderBy('operacionofertas.fecha', 'DSC')
                        ->get(['operacionofertas.*']);*/

        $operacioneso = Operacionoferta::leftJoin('ofertas', 'operacionofertas.id_contra', '=', 'ofertas.id')
                                                ->where('ofertas.id_op', '=', $id)
                                                ->orderBy('operacionofertas.fecha', 'DSC')
                                                ->get(['operacionofertas.*']);

        $operacionesd = Operaciondemanda::leftJoin('demandas', 'operaciondemandas.id_contra', '=', 'demandas.id')
                                                ->where('demandas.id_op', '=', $id)
                                                ->orderBy('operaciondemandas.fecha', 'DSC')
                                                ->get(['operaciondemandas.*']);

    	return view('usuario/operaciones', array('operacioneso' => $operacioneso, 'operacionesd' => $operacionesd));

    }

     public function listaroperaciones() {

    	$operacionesd = Operaciondemanda::orderBy('fecha', 'DSC')->get();

        $operacioneso = Operacionoferta::orderBy('fecha', 'DSC')->get();

        /*return view('prueba', array('operacioneso' => $operacioneso));*/
    	return view('operaciones', array('operacioneso' => $operacioneso, 'operacionesd' => $operacionesd));

    }
}
