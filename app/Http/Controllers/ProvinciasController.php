<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\Ciudad;

class ProvinciasController extends Controller
{
    public function obtenerProvincias() {

    	/*$provincias = Provincias::list('id', 'nombre');
    	return compact('provincias');*/
    }

    public function getCiudades(Request $request, $id) {

    	if($request->ajax()) {
    		$ciudades = Ciudad::getCiudades($id);
    		return response()->json($ciudades);
    	}
    }
}
