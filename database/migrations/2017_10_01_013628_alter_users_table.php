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
            $table->string('razonsocial')->after('apellido')->nullable();
            $table->bigInteger('dni')->after('password');
            $table->bigInteger('telefono')->after('dni');
            $table->string('domicilio')->after('telefono');
            $table->integer('id_provincia')->unsigned()->after('domicilio');
            $table->integer('id_ciudad')->unsigned()->after('id_provincia');
            $table->integer('tipo_us')->unsigned()->after('id_ciudad');
            $table->boolean('activo')->default(false)->after('tipo_us');
            $table->boolean('admin')->default(false)->after('activo');

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
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('users_tipo_us_foreign'); 
            $table->dropForeign('users_id_ciudad_foreign');
            $table->dropForeign('users_id_provincia_foreign');  
            //Eliminacion de columnas de la tabla Users, en caso de rollback
            $table->dropColumn('apellido');
            $table->dropColumn('razonsocial');
            $table->dropColumn('dni');
            $table->dropColumn('telefono');
            $table->dropColumn('domicilio');
            $table->dropColumn('id_ciudad');
            $table->dropColumn('id_provincia');
            $table->dropColumn('tipo_us');
            $table->dropColumn('activo');
            $table->dropColumn('admin');          
        });
    }
}
