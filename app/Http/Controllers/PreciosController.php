<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Operacionoferta;
use MOHA\Operaciondemanda;
use MOHA\contraoferta;
use MOHA\Demanda;
use Illuminate\Support\Facades\DB;

class PreciosController extends Controller
{
    //

	public function precios () {

		$hoy = Date('Y-m-j');//Obtengo la fecha actual
		
		$mes = strtotime('-1 month', strtotime($hoy));
		$mes = strtotime('Y-m-j', $mes);

		$mes2 = strtotime('-2 month', strtotime($hoy));
		$mes2 = strtotime('Y-m-j', $mes2);

		$fecha = strtotime('-7 day', strtotime($hoy));//Resto 7 días a la fecha actual
															 //Para luego filtrar los precios solo de la ultima semana
		$fecha = date('Y-m-j', $fecha);//Doy formato a la fecha resultante

		//Obtengo precios del Día
		$preciosd = Operacionoferta::join('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
										->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
										->join('productos', 'ofertas.id_prod', '=', 'productos.id')
										->join('modos', 'ofertas.id_modo', '=', 'modos.id')
										->join('medidas', 'ofertas.id_medida', '=', 'medidas.id')
										->select(DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", ofertas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(contraofertas.precio) as max'), DB::raw('min(contraofertas.precio) as min'), DB::raw('CAST(avg(contraofertas.precio) as int) AS prom'))
										->whereDate('operacionofertas.fecha', '>', $fecha)
										->where('contraofertas.estado', '=', '1')
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('ofertas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['operacionofertas.*']);

		//Precios Demandados
		$precioso = Demanda::leftJoin('productos', 'demandas.id_prod', '=', 'productos.id')
										->join('modos', 'demandas.id_modo', '=', 'modos.id')
										->join('medidas', 'demandas.id_medida', '=', 'medidas.id')
										->select(DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", demandas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(demandas.precio) as max'), DB::raw('min(demandas.precio) as min'), DB::raw('CAST(avg(demandas.precio) as int) AS prom'))
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('demandas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['demandas.*']);

		//Tendencia Históricos
		$preciost = Demanda::leftJoin('productos', 'demandas.id_prod', '=', 'productos.id')
										->join('modos', 'demandas.id_modo', '=', 'modos.id')
										->join('medidas', 'demandas.id_medida', '=', 'medidas.id')
										->join('puestos', 'demandas.id_puesto', '=', 'puestos.id')
										->select(DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", demandas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(demandas.precio) as max'), DB::raw('min(demandas.precio) as min'), DB::raw('CAST(avg(demandas.precio) as int) AS prom'))
										->where('puestos.descripcion', 'LIKE', '%buenos aires%')
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('demandas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['demandas.*']);

		return view('precios', array('preciosd' => $preciosd, 'precioso' => $precioso, 'preciost' => $preciost));
	}
}
