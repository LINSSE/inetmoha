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

    public function despachante()
    {
        return $this->hasOne('App\Despachante', 'id', 'id_des');
    }

    public function representante()
    {
        return $this->hasOne('App\Representante', 'id', 'id_rep');
    }

    public function provincia()
    {
        return $this->hasOne('App\Provincia', 'id', 'id_provincia');
    }

    public function ciudad()
    {
        return $this->hasOne('App\Ciudad', 'id', 'id_ciudad');
    }

    public function contraoferta()
    {
        return $this->hasMany('App\Contraoferta', 'id', 'id_comprador');
    }
}
