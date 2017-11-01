<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Oferta;
use App\Producto;
use App\User;
use Session;

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
        Session::flash('nuevaOferta');
    	return back();
    }

    public function ofertas() {

    	$ofertas = Oferta::where('id_op', '=', (Auth::user()->id))->get();
    	$productos = Producto::All();
        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activo = 0;
        }

    	return view('usuario/ofertas', array('ofertas' => $ofertas, 'productos' => $productos, 'activo' => $activo));
    }

    public function buscarOfertas(Request $request) {
        $buscar = $request->buscar;
        $ofertas = Oferta::leftjoin('productos','ofertas.id_prod','=','productos.id')
                                     ->where('productos.nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('ofertas.fechaFin', 'like', '%'.$buscar.'%')
                                     ->orwhere('ofertas.puesto', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('ofertas.cobro', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('ofertas.modo', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->get();

        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activo = 0;
        }

        $productos = Producto::All();
        
        return view('ofertas', array('ofertas' => $ofertas, 'activo' => $activo, 'productos' => $productos));
    }

    public function eliminar(Request $request) {

    	$id = $request->id;
        $oferta = Oferta::FindOrFail($id);
        $oferta->delete();
    	return back();
    }
}
