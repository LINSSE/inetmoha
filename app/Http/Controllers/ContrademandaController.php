<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MOHA\User;
use MOHA\ContraDemanda;
use MOHA\Demanda;
use MOHA\Operaciondemanda;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use MOHA\Mail\DemandaAceptada;
use MOHA\Mail\DemandaRechazada;
use MOHA\Mail\ContraDemandaMail;

class ContrademandaController extends Controller
{
    public function store(Request $request) {

    	DB::beginTransaction();

        try {
            
            $cd = new ContraDemanda;

            $cd->id_comprador = Auth::user()->id;
            $cd->id_demanda = $request->id_demanda;
            $cd->cantidad = $request->cantidadCd;
            $cd->precio = $request->precioCd;
            $cd->id_cobro = $request->cobroCd;
            $cd->plazo = $request->plazoCd;
            $cd->save();

            Mail::to($cd->demanda->user->email)->send(new ContraDemandaMail($cd));
            Session::flash('contrademanda');

            DB::commit();

        } catch (\Trowable $e) {
            
            DB::rollback();
            throw $e;
        }

        
    	return back();
    }

    public function detalledemanda($id)  {

    	 $cdemandas = ContraDemanda::where('id_demanda', $id)->where('aceptada', false)->get();
         $cdacep = ContraDemanda::where('id_demanda', $id)->where('aceptada', true )->get();
    	 $dem = Demanda::Find($id);

    	 return view('/usuario/detalleContrademanda', array('cdemandas' => $cdemandas, 'cdacep' => $cdacep, 'dem' => $dem));
    }

    public function aceptardemanda ($id) {

        $cd = Contrademanda::Find($id);
        $dem = Demanda::Find($cd->id_demanda);

        $cant = $dem->cantidad - $cd->cantidad;

        DB::beginTransaction();

        try {

            $this->actualizardemanda($cant, $cd);            
            $this->generarOperacion($cd);

            Session::flash('demanda', 'La Demanda ha sido aceptada');
            DB::commit();

        } catch (\Throwable $e) {

            DB::rollback();
            throw $e;
        }

        

        return back();
    }

    public function actualizardemanda($cant, Contrademanda $cd) {

        if ($cant >= 0) {
            $rows = Demanda::where('id', $cd->id_demanda)->update(['cantidad' => $cant, 'abierta' => true]);
            $row = Contrademanda::where('id', $cd->id)->update(['aceptada' => true]);
        }

        return true;
    }

    public function generarOperacion(Contrademanda $cd) {
        
        $op = new Operaciondemanda;

        $op->id_contra = $cd->id;
        $op->fecha = Date('Y-m-j');
        $op->save();

        $user = Auth::user();
        Mail::to($cd->user->email)->send(new DemandaAceptada($user, $cd));

        return true;
    }

    public function rechazardemanda ($id) {

        DB::beginTransaction();

        try {

            $cd = Contrademanda::Find($id);
            $cd->delete();

            Mail::to($cd->user->email)->send(new DemandaRechazada($cd));
            Session::flash('demanda', 'La Demanda ha sido rechazada');
            DB::commit();
            
        } catch (\Throwable $e) {
            
            DB::rollback();
            throw $e;
        }

        

        return back();
    }
}
