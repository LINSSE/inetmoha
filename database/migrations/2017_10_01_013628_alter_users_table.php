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
            $table->string('razonsocial')->after('apellido');
            $table->integer('dni')->after('password');
            $table->bigInteger('telefono')->after('dni');
            $table->string('domicilio')->after('telefono');
            $table->integer('id_ciudad')->after('domicilio');
            $table->integer('id_provincia')->after('id_ciudad');
            $table->integer('tipo_us')->unsigned()->after('id_provincia');
            $table->boolean('activo')->default(false)->after('id_rep');
            $table->boolean('admin')->default(false)->after('activo');

            $table->foreign('tipo_us')->references('id')->on('tipo_usuario')->onDelete('cascade');
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
            $table->dropColumn('tipo_us');
            $table->dropColumn('activo');
            $table->dropColumn('admin');

            $table->dropForeign('users_tipo_us_foreign');          
        });
    }
}
