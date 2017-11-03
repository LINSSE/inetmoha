<?php

namespace MOHA;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    public static function getCiudades($id) {
    	return Ciudad::where('id_provincia', '=', $id)->orderBy('nombre', 'ASC')->distinct()->get();
    	
    }
}
