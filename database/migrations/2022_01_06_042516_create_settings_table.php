<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('fees')->unsigned(); 
            $table->text('privacy')->default('privacy'); 
            $table->text('terms')->default('terms'); ;   
            $table->text('about')->default('about'); ;            
            $table->string('pay_phone', 25);
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google_play');            
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
        Schema::dropIfExists('settings');
    }
}
