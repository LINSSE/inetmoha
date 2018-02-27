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
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('id_cobro')->unsigned();
            $table->enum('plazo', ['Contado', '30', '60', '90'])->default('Contado');
            $table->boolean('aceptada')->default(false);
            $table->timestamps();

            $table->foreign('id_oferta')->references('id')->on('ofertas')->onDelete('cascade');
            $table->foreign('id_comprador')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_cobro')->references('id')->on('cobros')->onDelete('cascade');
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
