<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MOHA\User;
use MOHA\Contraoferta;
use MOHA\Oferta;
use MOHA\Operacionoferta;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use MOHA\Mail\OfertaAceptada;
use MOHA\Mail\OfertaRechazada;
use MOHA\Mail\ContraOfertaMail;

class ContraofertaController extends Controller
{
    public function store(Request $request) {

    	DB::beginTransaction();

        try {
            
            $co = new Contraoferta;

            $co->id_comprador = Auth::user()->id;
            $co->id_oferta = $request->id_oferta;
            $co->cantidad = $request->cantidadCo;
            $co->precio = $request->precioCo;
            $co->id_cobro = $request->cobroCo;
            $co->plazo = $request->plazoCo;
            $co->id_puesto = $request->puestoCo;
            $co->save();

            Mail::to($co->oferta->user->email)->send(new ContraOfertaMail($co));
            Session::flash('contraoferta');

            DB::commit();

        } catch (\Trowable $e) {
            
            DB::rollback();
            throw $e;
        }

        
    	return back();
    }

    public function detalleOferta($id)  {

    	 $cofertas = Contraoferta::where('id_oferta', $id)->where('estado', '=', '0')->get();
         $cofacep = Contraoferta::where('id_oferta', $id)->where('estado', '=', '1')->get();
    	 $of = Oferta::Find($id);

    	 return view('/usuario/detalleContraOferta', array('cofertas' => $cofertas, 'cofacep' => $cofacep, 'of' => $of));
    }

    public function aceptarOferta ($id) {

        $co = Contraoferta::Find($id);
        $of = Oferta::Find($co->id_oferta);

        $cant = $of->cantidad - $co->cantidad;

        DB::beginTransaction();

        try {

            $this->actualizarOferta($cant, $co);            
            $this->generarOperacion($co);

            Session::flash('oferta', 'La Oferta ha sido aceptada');
            DB::commit();

        } catch (\Throwable $e) {

            DB::rollback();
            throw $e;
        }

        

        return back();
    }

    public function actualizarOferta($cant, Contraoferta $co) {

        if ($cant >= 0) {
            $rows = Oferta::where('id', $co->id_oferta)->update(['cantidad' => $cant, 'abierta' => true]);
            $row = Contraoferta::where('id', $co->id)->update(['estado' => '1']);
        }

        return true;
    }

    public function generarOperacion(Contraoferta $co) {
        
        $op = new Operacionoferta;

        $op->id_contra = $co->id;
        $op->fecha = Date('Y-m-j');

        $op->save();

        $user = Auth::user();
        Mail::to($co->user->email)->send(new OfertaAceptada($user, $co));

        return true;
    }

    public function rechazarOferta ($id) {

        DB::beginTransaction();

        try {

            $co = Contraoferta::Find($id);
            $row = Contraoferta::where('id', $co->id)->update(['estado' => '2']);

            Mail::to($co->user->email)->send(new OfertaRechazada($co));
            Session::flash('oferta', 'La Oferta ha sido rechazada');
            DB::commit();
            
        } catch (\Throwable $e) {
            
            DB::rollback();
            throw $e;
        }

        return back();
    }

    public function eliminar(Request $request) {

        $id = $request->id;
        $co = Contraoferta::FindOrFail($id);
        $co->delete();

        Session::flash('oferta', 'Su Contra Oferta ha sido eliminada!');
        return back();
    }

    public function editarCoferta(Request $request) {

        $id = $request->id;
        $co = Contraoferta::FindOrFail($id);
        $row = Contraoferta::where('id', $co->id)->update(['estado' => '3']);

        return back();
    }
}
