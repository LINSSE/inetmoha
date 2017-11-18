<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Demanda;
use MOHA\Producto;
use Auth;
use MOHA\User;

class DemandasController extends Controller
{
    public function store(Request $request) {

    	$demanda = new Demanda;

    	$demanda->id_op = Auth::user()->id;
    	$demanda->id_prod = $request->id_prod;
    	$demanda->cantidad = $request->cantidad;
    	$demanda->precio = $request->precio;
    	$demanda->pago = $request->pago;
    	$demanda->destino = $request->destino;
    	$demanda->modo = $request->modo;

    	$demanda->save();

    	return back();
    }

    public function demandas() {

    	$demandas = Demanda::where('id_op', '=', (Auth::user()->id))->get();
    	$productos = Producto::All();

    	return view('usuario/demandas', array('demandas' => $demandas, 'productos' => $productos));
    }

    public function buscarDemandas(Request $request) {
        $buscar = $request->buscar;
        $demandas = Demanda::leftjoin('productos','demandas.id_prod','=','productos.id')
                                     ->where('productos.nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('demandas.pago', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('demandas.destino', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('demandas.modo', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->get();

        $productos = Producto::All();
        
        return view('demandas', array('demandas' => $demandas, 'productos' => $productos));
    }

    public function eliminar(Request $request) {

    	$id = $request->id;
        $demanda = Demanda::FindOrFail($id);
        $demanda->delete();
    	return back();
    }
}
