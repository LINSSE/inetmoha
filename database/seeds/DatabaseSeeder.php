<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        DespachantesTableSeeder::class,
        RepresentantesTableSeeder::class,
        UsersTableSeeder::class,
    	]);
    }
}
