<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //Agregando columnas a la tabla Users
            $table->string('apellido')->after('name');
            $table->integer('dni')->after('password');
            $table->bigInteger('telefono')->after('dni');
            $table->string('domicilio')->after('telefono');
            $table->integer('id_ciudad')->after('domicilio');
            $table->integer('id_provincia')->after('id_ciudad');
            $table->integer('id_des')->unsigned()->nullable()->default(1)->after('id_provincia');
            $table->integer('id_rep')->unsigned()->after('id_des');
            $table->boolean('activo')->default(false)->after('id_rep');

            $table->foreign('id_des')->references('id')->on('despachantes');
            $table->foreign('id_rep')->references('id')->on('representantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //Eliminacion de columnas de la tabla Users, en caso de rollback
            $table->dropColumn('apellido');
            $table->dropColumn('dni');
            $table->dropColumn('telefono');
            $table->dropColumn('domicilio');
            $table->dropColumn('id_ciudad');
            $table->dropColumn('id_provincia');
            $table->dropColumn('id_des');
            $table->dropColumn('id_rep');
            $table->dropColumn('activo');

            $table->dropForeign('users_id_des_foreign');
            $table->dropForeign('users_id_rep_foreign');            
        });
    }
}
