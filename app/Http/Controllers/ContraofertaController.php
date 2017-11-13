<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MOHA\User;
use MOHA\Contraoferta;
use MOHA\Oferta;
use MOHA\Operacion;
use Session;
use Illuminate\Support\Facades\Mail;
use MOHA\Mail\OfertaAceptada;
use MOHA\Mail\OfertaRechazada;
use MOHA\Mail\ContraOfertaMail;

class ContraofertaController extends Controller
{
    public function store(Request $request) {

    	$co = new Contraoferta;

    	$co->id_comprador = Auth::user()->id;
    	$co->id_oferta = $request->idco;
    	$co->cantidad = $request->cantidad;

    	$co->save();

        Mail::to($co->oferta->user->email)->send(new ContraOfertaMail($co));
    	Session::flash('contraoferta');
    	return back();
    }

    public function detalleOferta($id)  {

    	 $cofertas = Contraoferta::where('id_oferta', $id)->where('aceptada', false)->get();
         $cofacep = Contraoferta::where('id_oferta', $id)->where('aceptada', true )->get();
    	 $of = Oferta::Find($id);

    	 return view('/usuario/detalleContraOferta', array('cofertas' => $cofertas, 'cofacep' => $cofacep, 'of' => $of));
    }

    public function aceptarOferta ($id) {

        $co = Contraoferta::Find($id);
        $of = Oferta::Find($co->id_oferta);

        $cant = $of->cantidad - $co->cantidad;

        $rows = Oferta::where('id', $co->id_oferta)->update(['cantidad' => $cant, 'abierta' => true]);
        $rows = Contraoferta::where('id', $id)->update(['aceptada' => true]);

        
        //Si la contraoferta es aceptada genero una operacion para esa oferta
        $op = new Operacion;

        $op->id_oferta = $co->id_oferta;
        $op->cantidad = $co->cantidad;
        $op->fecha = Date('Y-m-j');
        $op->precio = $co->oferta->precio;
        $op->pago = $co->oferta->cobro;
        $op->destino = $co->oferta->puesto;
        $op->modo = $co->oferta->modo;

        $op->save();

        $user = Auth::user();
        Mail::to($co->user->email)->send(new OfertaAceptada($user, $co));
        Session::flash('oferta', 'La Oferta ha sido aceptada');

        return back();
    }

    public function rechazarOferta ($id) {

        $co = Contraoferta::Find($id);

        $co->delete();

        Mail::to($co->user->email)->send(new OfertaRechazada($co));

        Session::flash('oferta', 'La Oferta ha sido rechazada');

        return back();
    }

}
