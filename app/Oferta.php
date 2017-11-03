<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = [
        'id_op', 'id_prod', 'cantidad', 'precio', 'fechaInicio', 'fechaFin', 'puesto', 'cobro', 'modo', 'abierta',
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
}
