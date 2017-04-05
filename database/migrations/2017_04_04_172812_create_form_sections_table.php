<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_sections', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('form_header_id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('sub_heading')->nullable();
            $table->boolean('is_required')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('form_sections');
    }
}
