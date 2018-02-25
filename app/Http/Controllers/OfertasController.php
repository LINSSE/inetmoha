<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MOHA\Oferta;
use MOHA\Producto;
use MOHA\User;
use MOHA\Modo;
use MOHA\Cobro;
use MOHA\Puesto;
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
    	$oferta->id_puesto = $request->puesto;
    	$oferta->id_cobro = $request->cobro;
        $oferta->plazo = $request->plazo;
    	$oferta->id_modo = $request->modo;

    	$oferta->save();
        Session::flash('oferta', 'Su Oferta ha sido publicada con éxito!');
    	return back();
    }

    public function misofertas() {

    	$ofertas = Oferta::where('id_op', '=', (Auth::user()->id))->get();
    	$productos = Producto::All();
        $modos = Modo::orderBy('descripcion', 'ASC')->get();
        $cobros = Cobro::orderBy('descripcion', 'ASC')->get();
        $puestos = Puesto::orderBy('descripcion', 'ASC')->get();

    	return view('usuario/ofertas', array('ofertas' => $ofertas, 'productos' => $productos, 'modos' => $modos, 'cobros' => $cobros, 'puestos' => $puestos));
    }

    public function ofertas () {

        $hoy = Date('Y-m-j');
        $ofertas = Oferta::whereDate('fechaInicio', '<=', $hoy)->whereDate('fechaFin', '>=', $hoy)->orderBy('fechaFin', 'DSC')->get();
        
        return view('ofertas', array('ofertas' => $ofertas));
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

        $productos = Producto::All();
        
        return view('ofertas', array('ofertas' => $ofertas, 'productos' => $productos));
    }

    public function eliminar(Request $request) {

    	$id = $request->id;
        $oferta = Oferta::FindOrFail($id);
        $oferta->delete();

        Session::flash('oferta', 'Su Oferta ha sido eliminada!');
    	return back();
    }
}
