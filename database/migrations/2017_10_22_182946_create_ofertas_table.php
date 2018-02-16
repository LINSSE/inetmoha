<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_op')->unsigned();
            $table->integer('id_prod')->unsigned();
            $table->integer('cantidad');
            $table->double('precio');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->integer('id_puesto')->unsigned();
            $table->integer('id_cobro')->unsigned();
            $table->integer('id_modo')->unsigned();
            $table->boolean('abierta')->default(false);
            $table->timestamps();

            $table->foreign('id_op')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_prod')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('cascade');
            $table->foreign('id_cobro')->references('id')->on('cobros')->onDelete('cascade');
            $table->foreign('id_modo')->references('id')->on('modos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}