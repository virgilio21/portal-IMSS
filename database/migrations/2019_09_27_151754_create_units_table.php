<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_unit');
            $table->bigInteger('matter_user_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign(['matter_user_id','user_id'])->references(['matter_user_id','user_id'])->on('matter_user_user')->onDelete('cascade');
            $table->double('qualification')->nullable();
            $table->boolean('visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
