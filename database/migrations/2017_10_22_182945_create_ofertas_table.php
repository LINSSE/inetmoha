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
            $table->date('fecha');
            $table->enum('puesto', ['Finq', 'Epq']);
            $table->enum('cobro', ['Cdo', 'CPD', 'Com', 'Efec']);
            $table->enum('modo', ['Raso', 'Emb', 'Abie']);
            $table->timestamps();

            $table->foreign('id_op')->references('id')->on('users');
            $table->foreign('id_prod')->references('id')->on('productos');
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
