<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        return view('usuario/perfil', array('user' => $user));
    }

    public function listarOperadores(){
        $users = User::where('id', '!=', Auth::id())->orderBy('apellido', 'razonsocial', 'ASC')->get();

        return view('/admin/operadores', array('users' => $users));
    }

    public function buscarOperadores(Request $request) {
        $buscar = $request->buscar;
        $buscar2 = $request->usuarios;

        if (!empty($buscar2)) {
            $users = User::where(function($q) use ($buscar) {
                            $q->where('apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                            ->orwhere('email', 'like', '%'.$buscar.'%')
                            ->orwhere('dni', 'like', '%'.$buscar.'%')
                            ->orwhere('email', 'like', '%'.$buscar.'%')
                            ->orwhere('telefono', 'like', '%'.$buscar.'%')
                            ->orwhere('razonsocial', 'like', '%'.$buscar.'%')
                            ->orwhere('domicilio', 'like', '%'.$buscar.'%')
                            ->orwhere('name', 'like', '%'.ucwords(strtolower($buscar)).'%')->get();
                        })
                        ->where(function($q) use ($buscar2) {
                        $q->whereIn('tipo_us', $buscar2)->get();
                        })
                        ->orderBy('apellido', 'razonsocial', 'ASC')->get();
        }
        else {
            $users = User::where(function($q) use ($buscar) {
                            $q->where('apellido', 'like', '%'.ucwords(strtolower($buscar)).'%')
                            ->orwhere('email', 'like', '%'.$buscar.'%')
                            ->orwhere('dni', 'like', '%'.$buscar.'%')
                            ->orwhere('email', 'like', '%'.$buscar.'%')
                            ->orwhere('telefono', 'like', '%'.$buscar.'%')
                            ->orwhere('razonsocial', 'like', '%'.$buscar.'%')
                            ->orwhere('domicilio', 'like', '%'.$buscar.'%')
                            ->orwhere('name', 'like', '%'.ucwords(strtolower($buscar)).'%')->get();
                        })
                        ->orderBy('apellido', 'razonsocial', 'ASC')->get();
        }
        return view('admin/operadores', array('users' => $users));
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
