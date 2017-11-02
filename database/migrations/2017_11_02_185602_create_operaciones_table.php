<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oferta')->unsigned();
            $table->integer('cantidad');
            $table->date('fecha');
            $table->double('precio');
            $table->enum('pago', ['Cdo', 'CPD', 'Com', 'Efec']);
            $table->enum('destino', ['BA', 'ROS', 'CBA', 'BRQ', 'COR']);
            $table->enum('modo', ['Raso', 'Emb', 'Abie']);
            $table->timestamps();

            $table->foreign('id_oferta')->references('id')->on('ofertas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operaciones');
    }
}
