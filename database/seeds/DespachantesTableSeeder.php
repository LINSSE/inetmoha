<?php

use Illuminate\Database\Seeder;

class DespachantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('despachantes')->delete();
        
        \DB::table('despachantes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => '',
                'apellido' => 'Sin Despachante',
                'telefono' => 3794513649,
                'email' => 'sin@despachante.com',
                'created_at' => '2017-10-11 12:48:57',
                'updated_at' => '2017-10-11 12:48:57',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Jose',
                'apellido' => 'Perez',
                'telefono' => 3794513623,
                'email' => 'jose@perez.com',
                'created_at' => '2017-10-11 12:48:57',
                'updated_at' => '2017-10-11 12:48:57',
            ),
        ));
    }
}
