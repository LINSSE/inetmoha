<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despachante extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'email',
    ];
}
