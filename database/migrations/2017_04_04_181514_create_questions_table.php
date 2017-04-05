<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('form_section_id');
            $table->integer('input_type_id');
            $table->string('question_name');
            $table->string('question_subtext')->nullable();
            $table->boolean('answer_required')->default(false);
            $table->integer('option_group_id')->nullable();
            $table->integer('dependent_question_option_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
