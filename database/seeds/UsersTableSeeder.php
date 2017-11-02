<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrador',
                'apellido' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'dni' => 0,
                'telefono' => 0,
                'domicilio' => 'san martin',
                'id_ciudad' => 6372,
                'id_provincia' => 5,
                'id_des' => 1,
                'id_rep' => 1,
                'activo' => 1,
                'admin' => 1,
                'remember_token' => 'cXobM1QOv1L0FDlFkJzgWspHkluC9jWseVN8yIlmg0XETcYfI2JngelqJppR',
                'created_at' => '2017-10-11 12:48:57',
                'updated_at' => '2017-10-11 12:48:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Gabriel',
                'apellido' => 'Rodriguez',
                'email' => 'dgabrielg_06@hotmail.com',
                'password' => bcrypt('123456'),
                'dni' => 35165132,
                'telefono' => '365132351651',
                'domicilio' => 'Bolivar 523',
                'id_ciudad' => 6475,
                'id_provincia' => 5,
                'id_des' => 2,
                'id_rep' => 1,
                'activo' => 0,
                'admin' => 0,
                'remember_token' => 'TWASIteM7rgtDG4WxsYlzMOFR2uXgnRtatVctciq0HkTXUDeHv1jufGcb8UF',
                'created_at' => '2017-10-11 13:01:42',
                'updated_at' => '2017-10-17 23:09:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dustin',
                'apellido' => 'Gassmann',
                'email' => 'dg@gmail.com',
                'password' => bcrypt('123456'),
                'dni' => 34012450,
                'telefono' => '3731541425',
                'domicilio' => 'Jujuy 731',
                'id_ciudad' => 6372,
                'id_provincia' => 5,
                'id_des' => 1,
                'id_rep' => 2,
                'activo' => 1,
                'admin' => 0,
                'remember_token' => '8aavih7p2jsTvS9cQEakFZxoH0iJhciuAnErlMsH54FBkQEaTpfd8bwpYqAD',
                'created_at' => '2017-10-11 13:15:33',
                'updated_at' => '2017-10-18 13:29:40',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dustin',
                'apellido' => 'Gass',
                'email' => 'dg@hot.com',
                'password' => bcrypt('123456'),
                'dni' => 34012450,
                'telefono' => '3731541425',
                'domicilio' => 'Jujuy 854',
                'id_ciudad' => 15754,
                'id_provincia' => 5,
                'id_des' => 1,
                'id_rep' => 1,
                'activo' => 1,
                'admin' => 0,
                'remember_token' => 'F33j9QqHmPGl7qZvQwq6j8t84eoVOhVWa7aXcGQbi8869o6mDZfJTOGXL8NG',
                'created_at' => '2017-10-12 15:35:30',
                'updated_at' => '2017-10-17 23:09:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Martin',
                'apellido' => 'Cardozo',
                'email' => 'marti@cardo.com',
                'password' => bcrypt('123456'),
                'dni' => 32165465,
                'telefono' => '6568462162165',
                'domicilio' => 'Laprida',
                'id_ciudad' => 6372,
                'id_provincia' => 5,
                'id_des' => 1,
                'id_rep' => 1,
                'activo' => 1,
                'admin' => 0,
                'remember_token' => 'dF9CH4uWt5Hr4UufHlCAYiKuM7mY1WsTAWTCSVQdHiPxS5OaMpJ5ORnukyXM',
                'created_at' => '2017-10-17 09:12:22',
                'updated_at' => '2017-10-17 09:16:35',
            ),
        ));
        
        
    }
}