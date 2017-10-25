<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $fillable = [
        'id_op', 'id_prod', 'cantidad', 'precio', 'pago', 'destino', 'modo',
    ];
}
