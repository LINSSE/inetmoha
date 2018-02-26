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
        $ofertas = Oferta::whereDate('fechaInicio', '<=', $hoy)->whereDate('fechaFin', '>=', $hoy)->orderBy('fechaFin', 'ASC')->get();
        
        return view('ofertas', array('ofertas' => $ofertas));
    }

    public function buscarOfertas(Request $request) {
        
        $hoy = Date('Y-m-j');
        $buscar = $request->buscar;
        $ofertas = Oferta::leftjoin('productos','ofertas.id_prod','=','productos.id')
                            ->leftjoin('users','ofertas.id_op','=','users.id')
                            ->leftjoin('modos','ofertas.id_modo','=','modos.id')
                            ->leftjoin('cobros','ofertas.id_cobro','=','cobros.id')
                            ->leftjoin('puestos','ofertas.id_puesto','=','puestos.id')
                                     ->whereDate('ofertas.fechaInicio', '<=', $hoy)->whereDate('ofertas.fechaFin', '>=', $hoy)
                                     ->where(function ($query) use ($buscar){
                                        $query->where('productos.nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('users.name', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('users.apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('users.razonsocial', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('modos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('cobros.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('puestos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('ofertas.fechaFin', 'like', '%'.$buscar.'%');
                                     })
                                     ->orderBy('ofertas.fechaFin', 'ASC')
                                     ->get();
        
        return view('ofertas', array('ofertas' => $ofertas));
    }

    public function eliminar(Request $request) {

    	$id = $request->id;
        $oferta = Oferta::FindOrFail($id);
        $oferta->delete();

        Session::flash('oferta', 'Su Oferta ha sido eliminada!');
    	return back();
    }
}
