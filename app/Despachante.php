<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despachante extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'email',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_desp');
    }
}
