<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    //
    protected $fillable = [
        'descripcion',
    ];

    public function producto()
    {
        return $this->belongsTo('MOHA\Producto', 'id_medida');
    }
}
