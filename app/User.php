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
        'name', 'apellido', 'razonsocial', 'email', 'password', 'dni', 'domicilio', 'telefono', 'id_ciudad', 'id_provincia', 'tipo_us', 'activo',
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

    public function tipoUsuario()
    {
        return $this->belongsto('MOHA\TipoUsuario', 'tipo_us');
    }
}
