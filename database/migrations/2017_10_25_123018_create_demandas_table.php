<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_op')->unsigned();
            $table->integer('id_prod')->unsigned();
            $table->integer('cantidad');
            $table->double('precio');
            $table->enum('pago', ['Cdo', 'CPD', 'Com', 'Efec']);
            $table->enum('destino', ['BA', 'ROS', 'CBA', 'BRQ', 'COR']);
            $table->enum('modo', ['Raso', 'Emb', 'Abie']);
            $table->timestamps();

            $table->foreign('id_op')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_prod')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandas');
    }
}
