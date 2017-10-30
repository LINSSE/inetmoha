<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demanda;
use App\Producto;
use Auth;
use App\User;

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
        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activo = 0;
        }

    	return view('usuario/demandas', array('demandas' => $demandas, 'productos' => $productos, 'activo' => $activo));
    }

    public function buscarDemandas(Request $request) {
        $buscar = $request->buscar;
        $demandas = Demanda::leftjoin('productos','demandas.id_prod','=','productos.id')
                                     ->where('productos.nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->get();

        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activo = 0;
        }

        $productos = Producto::All();
        
        return view('demandas', array('demandas' => $demandas, 'activo' => $activo, 'productos' => $productos));
    }

    public function eliminar(Request $request) {

    	$id = $request->id;
        $demanda = Demanda::FindOrFail($id);
        $demanda->delete();
    	return back();
    }
}
