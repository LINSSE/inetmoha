<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Operacionoferta;
use MOHA\Operaciondemanda;
use MOHA\contraoferta;
use MOHA\Demanda;
use Illuminate\Support\Facades\DB;
use DateTime;
use Charts;

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
		$preciosd = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
										->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
										->join('productos', 'ofertas.id_prod', '=', 'productos.id')
										->join('modos', 'ofertas.id_modo', '=', 'modos.id')
										->join('medidas', 'ofertas.id_medida', '=', 'medidas.id')
										->select(DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", ofertas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(contraofertas.precio) as max'), DB::raw('min(contraofertas.precio) as min'), DB::raw('CAST(avg(contraofertas.precio) as int) AS prom'))
										->whereDate('operacionofertas.fecha', '=', $hoy)
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('ofertas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['operacionofertas.*']);

		//Precios Ofrecidos
		$precioso = Contraoferta::leftJoin('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
										->join('productos', 'ofertas.id_prod', '=', 'productos.id')
										->join('modos', 'ofertas.id_modo', '=', 'modos.id')
										->join('medidas', 'ofertas.id_medida', '=', 'medidas.id')
										->select(DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", ofertas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(contraofertas.precio) as max'), DB::raw('min(contraofertas.precio) as min'), DB::raw('CAST(avg(contraofertas.precio) as int) AS prom'))
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('ofertas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['contraofertas.*']);

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

	public function filtrarPrecios(Request $request) {
		
		if(empty($request->precioDia)){
			$fecha = Date('Y-m-j');
		}else{
			$fecha = $request->precioDia;
		}
		
		if(empty($request->fechai)){
			$hoy = Date('Y-m-j');
		
			$mes = strtotime('-1 month', strtotime($hoy));
			$fechaDes = strtotime('Y-m-j', $mes);
			$fechaHas = $hoy;
		}else{
			$fechaDes = $request->fechai;
			$fechaHas = $request->fechaf;
		}
		

		$preciosd = Operacionoferta::leftJoin('contraofertas', 'operacionofertas.id_contra', '=', 'contraofertas.id')
										->join('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
										->join('productos', 'ofertas.id_prod', '=', 'productos.id')
										->join('modos', 'ofertas.id_modo', '=', 'modos.id')
										->join('medidas', 'ofertas.id_medida', '=', 'medidas.id')
										->select(DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", ofertas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(contraofertas.precio) as max'), DB::raw('min(contraofertas.precio) as min'), DB::raw('CAST(avg(contraofertas.precio) as int) AS prom'))
										->whereDate('operacionofertas.fecha', '=', $fecha)
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('ofertas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['operacionofertas.*']);
		//Precios Demandados
		$precioso = Contraoferta::leftJoin('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
										->join('productos', 'ofertas.id_prod', '=', 'productos.id')
										->join('modos', 'ofertas.id_modo', '=', 'modos.id')
										->join('medidas', 'ofertas.id_medida', '=', 'medidas.id')
										->select(DB::raw('productos.id as id'), DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", ofertas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(contraofertas.precio) as max'), DB::raw('min(contraofertas.precio) as min'), DB::raw('CAST(avg(contraofertas.precio) as int) AS prom'))
										->whereBetween('contraofertas.created_at', [$fechaDes, $fechaHas])
										->groupBy('productos.id')
										->groupBy('productos.nombre')
										->groupBy('productos.descripcion')
										->groupBy('productos.descripcion2')
										->groupBy('modos.descripcion')
										->groupBy('ofertas.peso')
										->groupBy('medidas.descripcion')
										->orderBy('productos.nombre', 'DESC')
										->get(['contraofertas.*']);

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

		return view('precios', array('preciosd' => $preciosd, 'precioso' => $precioso, 'preciost' => $preciost, 'fechaDes' => $fechaDes, 'fechaHas' => $fechaHas));
	}
	

	public function graficarPrecios($id, $fd=null, $fh=null) {
		
		$hoy = Date('Y-m-j');
		//$id = $request->prod_id;

		
		
		$data = Contraoferta::leftJoin('ofertas', 'contraofertas.id_oferta', '=', 'ofertas.id')
				->join('productos', 'ofertas.id_prod', '=', 'productos.id')
				->join('modos', 'ofertas.id_modo', '=', 'modos.id')
				->join('medidas', 'ofertas.id_medida', '=', 'medidas.id')
				->select(DB::raw('DATE_FORMAT(contraofertas.created_at, "%Y-%m-%d") as fecha'), DB::raw('CONCAT(productos.nombre, " ", productos.descripcion, " ", productos.descripcion2, " ", modos.descripcion, " ", "X", " ", ofertas.peso, " ",  medidas.descripcion) as nombre'), DB::raw('max(contraofertas.precio) as max'), DB::raw('min(contraofertas.precio) as min'), DB::raw('CAST(avg(contraofertas.precio) as int) AS prom'))
				->where('productos.id', $id)
				->whereBetween('contraofertas.created_at', [$fd, $fh])
				->groupBy('productos.nombre')
				->groupBy('contraofertas.created_at')
				->groupBy('productos.descripcion')
				->groupBy('productos.descripcion2')
				->groupBy('modos.descripcion')
				->groupBy('ofertas.peso')
				->groupBy('medidas.descripcion')
				->orderBy('contraofertas.created_at', 'DESC')
				->get(['contraofertas.*'])->toArray();

				$max = array_column($data, 'max');
				$min = array_column($data, 'min');
				$prom = array_column($data, 'prom');
				$nombre = array_column($data, 'nombre');
				$fecha = array_column($data, 'fecha');

				//$nombre = $nombre[0];
		
		$chart = Charts::multi('line', 'highcharts')
				// Setup the chart settings
				->title($nombre[0])
				->elementLabel('Precios en $')
				// A dimension of 0 means it will take 100% of the space
				->responsive(true)
				// This defines a preset of colors already done:)
				->template("material")
				// You could always set them manually
				// ->colors(['#2196F3', '#F44336', '#FFC107'])
				// Setup the diferent datasets (this is a multi chart)
				->dataset('Mínimo', $min)
				->dataset('Promedio', $prom)
				->dataset('Máximo', $max)
				// Setup what the values mean
				->labels($fecha);

        return view('/reportes/precios', ['chart' => $chart]);


	}
	
}
