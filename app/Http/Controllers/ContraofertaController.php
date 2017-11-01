<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Contraoferta;
use App\Oferta;
use Session;

class ContraofertaController extends Controller
{
    public function store(Request $request) {

    	$co = new Contraoferta;

    	$co->id_comprador = Auth::user()->id;
    	$co->id_oferta = $request->idco;
    	$co->cant = $request->cantidad;

    	$co->save();
    	Session::flash('contraoferta');
    	return back();
    }

    public function detalleOferta($id)  {

    	 $cofertas = Contraoferta::where('id_oferta', '=', $id)->get();
    	 $of = Oferta::Find($id);

    	 return view('/usuario/detalleContraOferta', array('cofertas' => $cofertas, 'of' => $of));
    }
}
