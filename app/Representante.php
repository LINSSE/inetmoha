<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'email',
    ];

    public function user()
    {
        return $this->belongsTo('MOHA\User', 'id_op');
    }
}
