<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\User;
use MOHA\Ciudad;
use MOHA\Provincia;
use MOHA\Despachante;
use MOHA\Representante;
use MOHA\Producto;


class UserController extends Controller
{
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $despachantes = Despachante::orderBy('apellido', 'ASC')->get();
        $representantes = Representante::orderBy('apellido', 'ASC')->get();
        $ciudades = Ciudad::orderBy('nombre', 'ASC')->get();
        $provincias = Provincia::orderBy('nombre', 'ASC')->get();

        return view('usuario/perfil', array('user' => $user, 'provincias' => $provincias, 'ciudades' => $ciudades, 'despachantes' => $despachantes, 'representantes' => $representantes));
    }

    public function buscarOperadores(Request $request) {
        $buscar = $request->buscar;
        $ad = User::where('admin', '=', 1)->first();
        $users = User::where('name', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                                        ->orwhere('email', 'like', '%'.$buscar.'%')
                                        ->orwhere('dni', 'like', '%'.$buscar.'%')
                                        ->orwhere('email', 'like', '%'.$buscar.'%')
                                        ->orwhere('telefono', 'like', '%'.$buscar.'%')
                                        ->orderBy('apellido', 'ASC')->get();

        $despachantes = Despachante::All();
        
        return view('/admin/operadores', array('users' => $users, 'despachantes' => $despachantes));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarPerfil(Request $request)
    {
        $user = User::FindOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->dni = $request->dni;
        $user->domicilio = $request->domicilio;
        $user->telefono = $request->telefono;
        $user->id_ciudad = $request->id_ciudad;
        $user->id_provincia = $request->id_provincia;
        $user->id_des = $request->id_desp;
        $user->id_rep = $request->id_rep;

        $user->save();

        return redirect('/usuario/show/{Auth::user()->id}');
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
