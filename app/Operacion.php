<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operaciones';

    protected $fillable = [
        'id_oferta', 'cantidad', 'fecha', 'precio', 'pago', 'destino', 'modo',
    ];

    public function oferta()
    {
        return $this->hasOne('MOHA\Oferta', 'id', 'id_oferta');
    }

	public function demanda()
    {
        return $this->hasOne('MOHA\Demanda', 'id', 'id_oferta');
    }   
}
