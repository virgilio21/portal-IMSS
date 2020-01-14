<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurveyIdToSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {
            //
            $table->bigInteger('survey_id')->unsigned();

            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            //
            $table->dropForeign('sections_survey_id_foreign');
            $table->dropColumn('survey_id');
        });
    }
}
