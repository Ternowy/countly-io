<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswerInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answer_inputs', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_id');
            $table->integer('answer_id');
            $table->string('input_name');
            $table->json('value');
            //todo add unique index on answer_id and name
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
        Schema::dropIfExists('survey_answer_inputs');
    }
}
