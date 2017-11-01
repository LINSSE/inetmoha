<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContraofertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oferta')->unsigned();
            $table->integer('id_comprador')->unsigned();
            $table->integer('cant');
            $table->timestamps();

            $table->foreign('id_oferta')->references('id')->on('ofertas');
            $table->foreign('id_comprador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contraofertas');
    }
}
