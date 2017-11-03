<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Contraoferta extends Model
{
    protected $fillable = [
        'id_oferta', 'id_comprador', 'cantidad', 'aceptada',
    ];

    public function oferta()
    {
        return $this->belongsTo('MOHA\oferta', 'id_oferta');
    }

    public function user()
    {
        return $this->belongsTo('MOHA\User', 'id_comprador');
    }
}
