<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            //apellidos
            $table->string('surnames');
            //Direccion de casa
            $table->string('address');
            //Telefono
            $table->string('phone');
            //Matricula del alumno o maestro
            $table->string('enrollment');

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

            //
            $table->dropColumn('surnames');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('enrollment');
        });
    }
}
