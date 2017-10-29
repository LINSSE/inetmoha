<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni', 'apellido', 'domicilio', 'telefono', 'id_ciudad', 'id_provincia', 'id_des', 'id_rep', 'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function oferta()
    {
        return $this->hasMany('App\Oferta', 'id', 'id_op');
    }

    public function demanda()
    {
        return $this->hasMany('App\Demanda', 'id', 'id_op');
    }
}
