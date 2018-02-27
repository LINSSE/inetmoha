<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Producto;
use MOHA\Categoria;
use MOHA\Medida;
use MOHA\Cobro;
use MOHA\Puesto;
use MOHA\Modo;



class ProductoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProd(Request $request)
    {
        $prod = new Producto();
        $prod->nombre = ucwords(strtolower($request->nombre));
        $prod->descripcion = ucwords($request->descripcion);
        $prod->descripcion2 = ucwords($request->descripcion2);
        $prod->id_cat = $request->id_cat;
        $prod->save();
        return back();
    }

    public function storeCat(Request $request)
    {
        $cat = new Categoria();
        $cat->descripcion = ucwords(strtolower($request->descripcion));
        $cat->save();
        return back();
    }

    public function storeMed(Request $request)
    {
        $med = new Medida();
        $med->descripcion = ucwords(strtolower($request->descripcion));
        $med->save();
        return back();
    }

    public function storeCobro(Request $request)
    {
        $cob = new Cobro();
        $cob->descripcion = ucwords(strtolower($request->descripcion));
        $cob->save();
        return back();
    }

    public function storePuesto(Request $request)
    {
        $pue = new Puesto();
        $pue->descripcion = ucwords(strtolower($request->descripcion));
        $pue->save();
        return back();
    }

    public function storeModo(Request $request)
    {
        $mod = new Modo();
        $mod->descripcion = ucwords(strtolower($request->descripcion));
        $mod->save();
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $id = $request->id;
        $prod = Producto::FindOrFail($id);
        $prod->delete();
        return redirect('/admin/productos');
    }
}
