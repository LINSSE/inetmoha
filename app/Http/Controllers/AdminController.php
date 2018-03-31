<?php

namespace MOHA\Http\Controllers;

use Illuminate\Http\Request;
use MOHA\User;
use Illuminate\Support\Facades\Auth;
use MOHA\Producto;
use MOHA\Categoria;
use MOHA\Medida;
use \Chumper\Zipper\Zipper;

class AdminController extends Controller
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar($id)
    {
        try {

            $user = User::FindOrFail($id);
            $user->activo = 1;
            $user->save();
            
        } catch (\Trowable $e) {
            
            throw $e;
            
        }
        
        return redirect('admin/operadores');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivar($id)
    {
        try {

            $user = User::FindOrFail($id);
            $user->activo = 0;
            $user->save();
            
        } catch (\Trowable $e) {
            
            throw $e;
            
        }

        return redirect('admin/operadores');

    }

    public function productos(){
    	
        $productos = Producto::orderBy('descripcion', 'ASC')->paginate(5, array('productos.*'), 'p');
        $categorias = Categoria::orderBy('descripcion', 'ASC')->paginate(5, array('categorias.*'), 'c');
        $medidas = Medida::orderBy('descripcion', 'ASC')->paginate(5, array('medidas.*'), 'm');
    	return view('admin/productos', array('productos' => $productos, 'categorias' => $categorias, 'medidas' => $medidas));
    }

    public function operaciones(){
    	
    	return view('admin/operaciones');
    }

    public function nuevoOperador() {
        return view('admin/nuevoOperador');
    }

    public function enviarMail() {
       $this->call('GET','email/nuevoOperador');
        return View('email/nuevoOperador');
    }
    
}
