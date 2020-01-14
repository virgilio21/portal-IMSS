<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_user', function (Blueprint $table) {
            
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('answer_id')->unsigned();

            $table->primary(['user_id','answer_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('answer_id')->references('id')->on('answers');

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
        Schema::dropIfExists('answer_user');
    }
}
