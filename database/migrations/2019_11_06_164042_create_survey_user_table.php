<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_user', function (Blueprint $table) {
            
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('survey_id')->unsigned();
            $table->boolean('status')->default(false);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('survey_id')->references('id')->on('surveys');

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
        Schema::dropIfExists('survey_user');
    }
}
