<?php

use Illuminate\Database\Seeder;

class RepresentantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('representantes')->delete();
        
        \DB::table('representantes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Carlos',
                'apellido' => 'Moreira',
                'telefono' => 3794513649,
                'email' => 'carmorei@gmail.com',
                'created_at' => '2017-10-11 12:48:57',
                'updated_at' => '2017-10-11 12:48:57',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Juan',
                'apellido' => 'Lopez',
                'telefono' => 3794513633,
                'email' => 'juan@hotmail.com',
                'created_at' => '2017-10-11 12:48:57',
                'updated_at' => '2017-10-11 12:48:57',
            ),
        ));
    }
}
