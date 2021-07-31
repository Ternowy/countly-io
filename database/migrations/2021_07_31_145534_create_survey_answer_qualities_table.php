<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswerQualitiesTable extends Migration
{
    public function up()
    {
        Schema::create('survey_answer_qualities', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_answer_id');
            $table->integer('quality_rating');
            $table->bigInteger('input_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_answer_qualities');
    }
}
