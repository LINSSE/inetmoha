<?php

namespace MOHA\Http\Controllers\Auth;

use MOHA\User;
use MOHA\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Session;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \MOHA\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => ucwords(strtolower($data['name'])),
            'apellido' => ucwords(strtolower($data['apellido'])),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'dni' => $data['dni'],
            'telefono' => $data['telefono'],
            'domicilio' => ucwords(strtolower($data['domicilio'])),
            'id_ciudad' => $data['id_ciudad'],
            'id_provincia' => $data['id_provincia'],
            'id_des' => $data['id_des'],
            'id_rep' => $data['id_rep'],   
        ]);

        Mail::send('email/nuevoOperador', [], function($message){
            $message->to('dustingassmann@gmail.com');
            $message->subject('Nuevo Operador');
        });
        Session::flash('message','correcto');
        return $user;
    }
}
