<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operaciones';

    protected $fillable = [
        'id_oferta', 'cantidad', 'fecha', 'precio', 'pago', 'destino', 'modo',
    ];

    public function oferta()
    {
        return $this->hasOne('App\Oferta', 'id', 'id_oferta');
    }

}
