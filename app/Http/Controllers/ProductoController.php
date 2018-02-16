<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\Producto;
use MOHA\Categoria;
use MOHA\Medida;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        $prod->id_medida = $request->id_medida;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
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
