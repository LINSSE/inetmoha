<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = 'productos';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function oferta()
    {
        return $this->belongsTo('MOHA\Oferta', 'id_prod');
    }

    public function demanda()
    {
        return $this->belongsTo('MOHA\Demanda', 'id_prod');
    }
}
