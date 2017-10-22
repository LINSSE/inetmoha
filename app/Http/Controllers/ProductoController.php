<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Maatwebsite\Excel\Facades\Excel;

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
    public function store(Request $request)
    {
        $prod = new Producto();
        $prod->nombre = ucwords(strtolower($request->nombre));
        $prod->descripcion = ucwords($request->descripcion);
        $prod->save();
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


    

    public function preciosba() 
    {
        $path = 'public/recursos/PM-Hortalizas-17-Oct-2017.xlsx';

        Excel::load('public/recursos/archivo.xls', function($reader) {
            
            $result = $reader->get();

            foreach ($result as $key => $value) {
                    
                    //$datos[] = ['nombre' => $value->esp];
                    //echo 'Entra';
                    echo $value->nombre . '<br>';
                }

        })->get();
            // iteracción
            /*foreach ($data as $prod) {
                
                //$productos[] = 0;

                if($prod->ESP === 'TOMATE') {
                    $pd = new Producto;
                    $pd->nombre = $prod->ESP;
                }
                else{
                    $pd = new Producto;
                    $pd->nombre = 'noEntro';
                }
            }*/
 
 
        //return view('preciosba', array('datos' => $datos));
    }
}
