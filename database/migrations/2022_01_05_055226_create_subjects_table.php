<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id')->unsigned();
            $table->integer('path_id')->unsigned();
            $table->integer('stage_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('term_id')->default(0)->unsigned();
            $table->string('name');   
            $table->boolean('is_common')->default(true);     
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
        Schema::dropIfExists('subjects');
    }
}
