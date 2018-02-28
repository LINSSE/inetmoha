<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    //
    protected $table = 'operaciones';

    protected $fillable = [
        'id_oferta', 'cantidad', 'fecha', 'precio', 'id_cobro', 'plazo', 'tipo',
    ];

    public function oferta()
    {
        return $this->hasOne('MOHA\Oferta', 'id', 'id_oferta');
    }

    public function cobro()
    {
        return $this->hasOne('MOHA\Cobro', 'id', 'id_cobro');
    }
}
