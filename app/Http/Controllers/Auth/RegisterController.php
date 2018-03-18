<?php

namespace MOHA\Http\Controllers\Auth;

use MOHA\User;
use MOHA\Provincia;
use MOHA\TipoUsuario;
use MOHA\Mail\Bienvenido;
use MOHA\Mail\UsuarioRegistrado;
use MOHA\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
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

    public function showRegistrationForm()
    {   
        $provincias = Provincia::orderBy('nombre', 'ASC')->get();
        $tipousuarios = TipoUsuario::orderBy('descripcion', 'ASC')->get();
        return view('auth.register', array('tipousuarios' => $tipousuarios, 'provincias' => $provincias));
    }

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
        DB::beginTransaction();

        try {

            $user = User::create([
                'name' => ucwords(strtolower($data['name'])),
                'apellido' => ucwords(strtolower($data['apellido'])),
                'razonsocial' => ucwords(strtolower($data['razonsocial'])),
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'dni' => $data['dni'],
                'telefono' => $data['telefono'],
                'domicilio' => ucwords(strtolower($data['domicilio'])),
                'id_provincia' => $data['id_provincia'], 
                'id_ciudad' => $data['id_ciudad'],
                'tipo_us' => $data['tipo_us'],
                
            ]);

            Mail::to($user->email)->send(new Bienvenido());

            Mail::to('dustingassmann@gmail.com')->send(new UsuarioRegistrado());
            
            Session::flash('message','correcto');

            DB::commit();

        } catch (\Trowable $e) {

            DB::rollback();
            throw $e;
        }

        return $user;
    }
}
