<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido');
            $table->string('razonsocial')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('dni');
            $table->bigInteger('telefono');
            $table->string('domicilio');
            $table->integer('id_provincia')->unsigned();
            $table->integer('id_ciudad')->unsigned();
            $table->integer('tipo_us')->unsigned();
            $table->boolean('activo')->default(false);
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipo_us')->references('id')->on('tipo_usuarios')->onDelete('cascade');
            $table->foreign('id_ciudad')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('id_provincia')->references('id')->on('provincias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
