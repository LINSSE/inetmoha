<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Contrademanda extends Model
{
    //
    protected $fillable = [
        'id_demanda', 'id_comprador', 'cantidad', 'precio', 'id_cobro', 'plazo', 'aceptada',
    ];

    public function demanda()
    {
        return $this->hasOne('MOHA\Demanda', 'id', 'id_demanda');
    }

    public function user()
    {
        return $this->hasOne('MOHA\User', 'id', 'id_comprador');
    }

    public function cobro()
    {
        return $this->hasOne('MOHA\Cobro', 'id', 'id_cobro');
    }
}
