<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Provincia;
use App\Despachante;
use App\Representante;
use App\Producto;


class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $provincia = Provincia::find($user->id_provincia);
        $ciudad = Ciudad::find($user->id_ciudad);
        
        $despachante = Despachante::find($user->id_des);
        $representante = Representante::find($user->id_rep);

        return view('usuario/perfil', array('user' => $user, 'provincia' => $provincia, 'ciudad' => $ciudad, 'despachante' => $despachante, 'representante' => $representante ));
    }

    public function buscarOperadores(Request $request) {
        $buscar = $request->buscar;
        $ad = User::where('admin', '=', 1)->first();
        $users = User::where('name', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                     ->orwhere('email', 'like', '%'.$buscar.'%')
                                     ->orwhere('telefono', 'like', '%'.$buscar.'%')
                                     ->orderBy('apellido', 'ASC')->get();

        $despachantes = Despachante::All();
        $representantes = Representante::All();
        $provincias = Provincia::All();
        $ciudades = Ciudad::All();
        
        return view('/admin/operadores', array('users' => $users, 'despachantes' => $despachantes, 'representantes' => $representantes, 'provincias' => $provincias, 'ciudades' => $ciudades));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function demandas()
    {
        return view('usuario.demandas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function operaciones()
    {
        return view('usuario.operaciones');
    }

    public function prueba()
    {

        return view('prueba');
    }
}
