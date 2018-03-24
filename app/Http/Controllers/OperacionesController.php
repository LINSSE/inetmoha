<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Operacionoferta;
use MOHA\Operaciondemanda;
use MOHA\User;
use Auth;
use Session;

class OperacionesController extends Controller
{
    public function misoperaciones() {

    	$id = Auth::user()->id;

        $operacioneso = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
                                                ->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
                                                ->where('ofertas.id_op', '=', $id)
                                                ->orwhere('contraofertas.id_comprador', '=', $id)
                                                ->orderBy('operacionofertas.fecha', 'ASC')
                                                ->get(['operacionofertas.*']);

        $operacionesd = Operaciondemanda::leftJoin('contrademandas', 'operaciondemandas.id_contra', '=', 'contrademandas.id')
                                                ->join('demandas', 'contrademandas.id_demanda', '=', 'demandas.id')
                                                ->where('demandas.id_op', '=', $id)
                                                ->orwhere('contrademandas.id_comprador', '=', $id)
                                                ->orderBy('operaciondemandas.fecha', 'ASC')
                                                ->get(['operaciondemandas.*']);

    	return view('usuario/operaciones', array('operacioneso' => $operacioneso, 'operacionesd' => $operacionesd));
    }

    public function listaroperaciones() {

        $hoy = Date('Y-m-j');
        $operacionesd = Operaciondemanda::leftJoin('contrademandas', 'operaciondemandas.id_contra', '=', 'contrademandas.id')
                                            ->join('demandas', 'contrademandas.id_demanda', '=', 'demandas.id')
                                            ->where('demandas.fechaEntrega', '<=', $hoy)
                                            ->orderBy('operaciondemandas.fecha', 'ASC')
                                            ->get(['operaciondemandas.*']);

        $operacioneso = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
                                            ->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
                                            ->where('ofertas.fechaEntrega', '<=', $hoy)
                                            ->orderBy('operacionofertas.fecha', 'ASC')
                                            ->get(['operacionofertas.*']);

        $operacionescd = Operaciondemanda::leftJoin('contrademandas', 'operaciondemandas.id_contra', '=', 'contrademandas.id')
                                            ->join('demandas', 'contrademandas.id_demanda', '=', 'demandas.id')
                                            ->where('demandas.fechaEntrega', '>', $hoy)
                                            ->orderBy('operaciondemandas.fecha', 'ASC')
                                            ->get(['operaciondemandas.*']);

        $operacionesco = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
                                            ->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
                                            ->where('ofertas.fechaEntrega', '>', $hoy)
                                            ->orderBy('operacionofertas.fecha', 'ASC')
                                            ->get(['operacionofertas.*']);

    	return view('operaciones', array('operacioneso' => $operacioneso, 'operacionesd' => $operacionesd, 'operacionesco' => $operacionesco, 'operacionescd' => $operacionescd));

    }

    public function buscarOperaciones(Request $request) {
        
        $buscar = $request->buscar;
        
        $operacioneso = Operacionoferta::join('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
                                        ->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
                                        ->join('productos', 'ofertas.id_prod', '=', 'productos.id')
                                        ->join('categorias', 'productos.id_cat', '=', 'categorias.id')
                                        ->join('users', 'contraofertas.id_comprador', '=', 'users.id')
                                        ->join('puestos', 'ofertas.id_puesto', '=', 'puestos.id')
                                        ->join('modos', 'ofertas.id_modo', '=', 'modos.id')
                                        ->join('cobros', 'contraofertas.id_cobro', '=', 'cobros.id')
                                            ->where(function ($query) use ($buscar){
                                                $query->where('productos.nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('productos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('productos.descripcion2', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('categorias.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('users.name', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('users.apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('users.razonsocial', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('modos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('cobros.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('puestos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('operacionofertas.fecha', 'like', '%'.$buscar.'%');
                                             })
                                        ->orderBy('operacionofertas.fecha', 'ASC')
                                        ->get(['operacionofertas.*']);

        $operacionesd = Operaciondemanda::join('contrademandas', 'operaciondemandas.id_contra', '=', 'contrademandas.id')
                                        ->join('demandas', 'contrademandas.id_demanda', '=', 'demandas.id')
                                        ->join('productos', 'demandas.id_prod', '=', 'productos.id')
                                        ->join('categorias', 'productos.id_cat', '=', 'categorias.id')
                                        ->join('users', 'contrademandas.id_comprador', '=', 'users.id')
                                        ->join('puestos', 'demandas.id_puesto', '=', 'puestos.id')
                                        ->join('modos', 'demandas.id_modo', '=', 'modos.id')
                                        ->join('cobros', 'contrademandas.id_cobro', '=', 'cobros.id')
                                            ->where(function ($query) use ($buscar){
                                                $query->where('productos.nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('productos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('productos.descripcion2', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('categorias.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('users.name', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('users.apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('users.razonsocial', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('modos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('cobros.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('puestos.descripcion', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                                ->orwhere('operaciondemandas.fecha', 'like', '%'.$buscar.'%');
                                             })
                                        ->orderBy('operaciondemandas.fecha', 'ASC')
                                        ->get(['operaciondemandas.*']);

        return view('operaciones', array('operacioneso' => $operacioneso, 'operacionesd' => $operacionesd));
    }
}
