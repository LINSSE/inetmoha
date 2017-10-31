<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Despachante;
use App\User;

class DespachanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $des = new Despachante();
        $des->nombre = ucwords(strtolower($request->name));
        $des->apellido = ucwords(strtolower($request->apellido));
        $des->email = $request->email;
        $des->telefono = $request->telefono;
        $des->save();
        return back();
        
    }

    public function despachantes() {
        $dp = Despachante::where('nombre', '=', 'Sin Despachante')->first();
        $despachantes = Despachante::where('id', '!=', $dp->id)->orderBy('apellido', 'ASC')->get();
        
        return view('admin/despachantes', array('despachantes' => $despachantes));
    }

    public function buscarDesp(Request $request) {
        $buscar = $request->buscar;
        $dp = Despachante::where('nombre', '=', 'Sin Despachante')->first();
        $despachantes = Despachante::where('nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('email', 'like', '%'.$buscar.'%')
                                     ->orwhere('telefono', 'like', '%'.$buscar.'%')
                                     ->orderBy('apellido', 'ASC')->get();
        
        return view('admin/despachantes', array('despachantes' => $despachantes));
    }    

    public function eliminarDesp(Request $request)
    {
        $id_ant = $request->id; //id del Despachante a Eliminar
        $id_nuevo = $request->id_des; //id del Despachante de reemplazo
        $rows = User::where('id_des', '=', $id_ant)->update(['id_des' => $id_nuevo]);
        $desp = Despachante::destroy($id_ant);
        
        return redirect('admin/despachantes');
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
        //
    }
}
