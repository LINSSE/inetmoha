<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Representante;
use App\User;
use Session;

class RepresentanteController extends Controller
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
        $rep = new Representante();
        $rep->nombre = ucwords(strtolower($request->name));
        $rep->apellido = ucwords(strtolower($request->apellido));
        $rep->email = $request->email;
        $rep->telefono = $request->telefono;
        $rep->save();
        Session::flash('rep', 'El Representante ha sido agregado!');
        return back();
    }

    public function buscarRep(Request $request) {
        $buscar = $request->buscar;
        $representantes = Representante::where('nombre', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('email', 'like', '%'.$buscar.'%')
                                     ->orwhere('telefono', 'like', '%'.$buscar.'%')
                                     ->orderBy('apellido', 'ASC')->get();
        
        return view('admin/representantes', array('representantes' => $representantes));
    } 

    public function eliminarRep(Request $request)
    {
        $id_ant = $request->id; //id del Representante a Eliminar
        $id_nuevo = $request->id_rep; //id del Representante de reemplazo
        $rows = User::where('id_rep', '=', $id_ant)->update(['id_rep' => $id_nuevo]);
        $desp = Representante::destroy($id_ant);
        
        Session::flash('rep', 'El Representante ha sido eliminado!');
        return redirect('admin/representantes');
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
