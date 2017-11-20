<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Demanda;
use MOHA\Producto;
use Auth;
use MOHA\User;
use Session;

class DemandasController extends Controller
{
    public function store(Request $request) {

    	$demanda = new Demanda;

    	$demanda->id_op = Auth::user()->id;
    	$demanda->id_prod = $request->id_prod;
    	$demanda->cantidad = $request->cantidad;
    	$demanda->precio = $request->precio;
        $demanda->fechaInicio = $request->fecha;
        $demanda->fechaFin = $request->fechaf;
    	$demanda->pago = $request->pago;
    	$demanda->destino = $request->destino;
    	$demanda->modo = $request->modo;

    	$demanda->save();
        Session::flash('demanda', 'Su Demanda ha sido publicada con éxito!');
    	return back();
    }

    public function demandas () {
        if(Auth::check()) {
        $demandas = Demanda::All();
        
        return view('demandas', array('demandas' => $demandas));
        }else{
            
            return view('demandas');

        }
    }

    public function misdemandas() {

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

        Session::flash('demanda', 'Su Demanda ha sido eliminada!');
    	return back();
    }
}
