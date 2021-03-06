<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WheatherHourLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheather_hour_log', function (Blueprint $table) {
           // $table->id();
            $table->unsignedBigInteger('day_id');
            $table->time('time');
            
            $table->json('forecast');
            $table->timestamps();

            $table->foreign('day_id')->references('id')->on('wheather_day_log')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheather_hour_log');
    }
}
