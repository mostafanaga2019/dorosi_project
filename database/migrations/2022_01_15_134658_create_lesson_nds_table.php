<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonNdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_nds', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->unsigned();
            $table->integer('summary_count')->unsigned()->default(0);
            $table->integer('video_count')->unsigned()->default(0);           
            $table->string('name');    
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
        Schema::dropIfExists('lesson_nds');
    }
}
