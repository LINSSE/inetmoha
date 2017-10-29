<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = 'productos';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function oferta()
    {
        return $this->belongsTo('App\Oferta', 'id_prod');
    }

    public function demanda()
    {
        return $this->belongsTo('App\Demand', 'id_prod');
    }
}
