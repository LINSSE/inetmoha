<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = [
        'id_op', 'id_prod', 'cantidad', 'precio', 'fecha', 'puesto', 'cobro', 'modo',
    ];
}
