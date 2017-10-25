<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Oferta;
use App\Producto;
use App\User;

class OfertasController extends Controller
{
    public function store(Request $request) {

    	$oferta = new Oferta;

    	$oferta->id_op = Auth::user()->id;
    	$oferta->id_prod = $request->id_prod;
    	$oferta->cantidad = $request->cantidad;
    	$oferta->precio = $request->precio;
    	$oferta->fechaInicio = $request->fecha;
        $oferta->fechaFin = $request->fechaf;
    	$oferta->puesto = $request->puesto;
    	$oferta->cobro = $request->cobro;
    	$oferta->modo = $request->modo;

    	$oferta->save();

    	return back();
    }

    public function ofertas() {

    	$ofertas = Oferta::where('id_op', '=', (Auth::user()->id))->get();
    	$productos = Producto::All();
        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activ = 0;
        }

    	return view('usuario/ofertas', array('ofertas' => $ofertas, 'productos' => $productos, 'activo' => $activo));
    }

    public function eliminar(Request $request) {

    	$id = $request->id;
        $oferta = Oferta::FindOrFail($id);
        $oferta->delete();
    	return back();
    }
}
