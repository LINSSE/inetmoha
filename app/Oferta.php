<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = [
        'id_op', 'id_prod', 'cantidad', 'precio', 'fechaInicio', 'fechaFin', 'id_puesto', 'id_cobro', 'id_modo', 'abierta',
    ];

    public function user()
    {
        return $this->belongsTo('MOHA\User', 'id_op');
    }

    public function producto()
    {
        return $this->hasOne('MOHA\Producto', 'id', 'id_prod');
    }

    public function operacion()
    {
        return $this->belongsTo('MOHA\Operacion', 'id_oferta');
    }

    public function puesto()
    {
        return $this->hasOne('MOHA\Puesto', 'id', 'id_puesto');
    }

    public function cobro()
    {
        return $this->hasOne('MOHA\Cobro', 'id', 'id_cobro');
    }

    public function modo()
    {
        return $this->hasOne('MOHA\Modo', 'id', 'id_modo');
    }
}
