<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MOHA\Oferta;
use MOHA\Producto;
use MOHA\User;
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
        Session::flash('oferta', 'Su Oferta ha sido publicada con éxito!');
    	return back();
    }

    public function misofertas() {

    	$ofertas = Oferta::where('id_op', '=', (Auth::user()->id))->get();
    	$productos = Producto::All();
        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activo = 0;
        }

    	return view('usuario/ofertas', array('ofertas' => $ofertas, 'productos' => $productos, 'activo' => $activo));
    }

    public function ofertas () {

        if(Auth::check()) {
        $ofertas = Oferta::orderBy('fechaFin', 'ASC')->get();
        if(Auth::user()->activo === 1){
            $activo = 1;
        }else{
            $activo = 0;
        }
        return view('ofertas', array('ofertas' => $ofertas, 'activo' => $activo));
        }else{
            
            return view('ofertas');

        }
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

        Session::flash('oferta', 'Su Oferta ha sido eliminada!');
    	return back();
    }
}
