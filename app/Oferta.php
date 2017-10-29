<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = [
        'id_op', 'id_prod', 'cantidad', 'precio', 'fechaInicio', 'fechaFin', 'puesto', 'cobro', 'modo',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_op');
    }

    public function producto()
    {
        return $this->hasOne('App\Producto', 'id', 'id_prod');
    }

}
