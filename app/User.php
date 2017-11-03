<?php

namespace MOHA;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use MOHA\Notifications\MyResetPassword;

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


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }

    public function oferta()
    {
        return $this->hasMany('MOHA\Oferta', 'id', 'id_op');
    }

    public function demanda()
    {
        return $this->hasMany('MOHA\Demanda', 'id', 'id_op');
    }

    public function despachante()
    {
        return $this->hasOne('MOHA\Despachante', 'id', 'id_des');
    }

    public function representante()
    {
        return $this->hasOne('MOHA\Representante', 'id', 'id_rep');
    }

    public function provincia()
    {
        return $this->hasOne('MOHA\Provincia', 'id', 'id_provincia');
    }

    public function ciudad()
    {
        return $this->hasOne('MOHA\Ciudad', 'id', 'id_ciudad');
    }

    public function contraoferta()
    {
        return $this->hasMany('MOHA\Contraoferta', 'id', 'id_comprador');
    }
}
