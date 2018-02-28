<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class OperacionesOferta extends Model
{
    //
    protected $table = 'operaciones_ofertas';

    protected $fillable = [
        'id_oferta', 'cantidad', 'fecha', 'precio', 'id_cobro', 'plazo',
    ];

    public function oferta()
    {
        return $this->hasOne('MOHA\Oferta', 'id', 'id_oferta');
    }

    public function cobros()
    {
        return $this->hasOne('MOHA\Cobro', 'id', 'id_cobro');
    }
}
