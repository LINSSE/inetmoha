<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contraoferta extends Model
{
    protected $fillable = [
        'id_oferta', 'id_comprador', 'cantidad', 'aceptada',
    ];

    public function oferta()
    {
        return $this->belongsTo('App\oferta', 'id_oferta');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_comprador');
    }
}
