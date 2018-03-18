<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Producto;
use MOHA\Categoria;
use MOHA\Medida;
use MOHA\Cobro;
use MOHA\Puesto;
use MOHA\Modo;
use Session;


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
        Session::flash('mensaje', 'Producto agregado!');
        return back();
    }

    public function storeCat(Request $request)
    {
        $this->validate($request, [
        'descripcion' => 'required|unique:categorias|max:255',
        ]);

        $cat = new Categoria();
        $cat->descripcion = ucwords(strtolower($request->descripcion));
        $cat->save();
        Session::flash('mensaje', 'Categoría agregada!');
        return back();
    }

    public function storeMed(Request $request)
    {
        $this->validate($request, [
        'descripcion' => 'required|unique:medidas|max:255',
        ]);

        $med = new Medida();
        $med->descripcion = ucwords(strtolower($request->descripcion));
        $med->save();
        Session::flash('mensaje', 'Medida agregada!');
        return back();;
    }

    public function storeCobro(Request $request)
    {
        $this->validate($request, [
        'descripcion' => 'required|unique:cobros|max:255',
        ]);

        $cob = new Cobro();
        $cob->descripcion = ucwords(strtolower($request->descripcion));
        $cob->save();
        Session::flash('cobro', 'Cobro agregado!');
        return back();
    }

    public function storePuesto(Request $request)
    {
        $this->validate($request, [
        'descripcion' => 'required|unique:puestos|max:255',
        ]);

        $pue = new Puesto();
        $pue->descripcion = ucwords(strtolower($request->descripcion));
        $pue->save();
        Session::flash('puesto', 'Puesto agregado!');
        return back();
    }

    public function storeModo(Request $request)
    {
        $this->validate($request, [
        'descripcion' => 'required|unique:modos|max:255',
        ]);

        $mod = new Modo();
        $mod->descripcion = ucwords(strtolower($request->descripcion));
        $mod->save();
        Session::flash('modo', 'Modo agregado!');
        return back();
    }

    public function eliminar(Request $request)
    {
        $id = $request->id;
        $prod = Producto::FindOrFail($id);
        $prod->delete();
        Session::flash('mensaje', 'Producto eliminado!');
        return back();
    }

    public function eliminarModo(Request $request)
    {
        $id = $request->id;
        $modo = Modo::FindOrFail($id);
        $modo->delete();
        Session::flash('modo', 'Modo eliminado!');
        return back();
    }

    public function eliminarPuesto(Request $request)
    {
        $id = $request->id;
        $puesto = Puesto::FindOrFail($id);
        $puesto->delete();
        Session::flash('puesto', 'Puesto eliminado!');
        return back();
    }

    public function eliminarCat(Request $request)
    {
        $id = $request->id;
        $cat = Categoria::FindOrFail($id);
        $cat->delete();
        Session::flash('mensaje', 'Categoría eliminada!');
        return back();
    }

    public function eliminarMedida(Request $request)
    {
        $id = $request->id;
        $med = Medida::FindOrFail($id);
        $med->delete();
        Session::flash('mensaje', 'Medida eliminada!');
        return back();
    }

    public function eliminarCobro(Request $request)
    {
        $id = $request->id;
        $cobro = Cobro::FindOrFail($id);
        $cobro->delete();
        Session::flash('cobro', 'Cobro eliminado!');
        return back();
    }
}
