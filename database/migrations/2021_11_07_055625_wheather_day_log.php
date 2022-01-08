<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WheatherDayLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheather_day_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->date('date');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->index(['city_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheather_day_log');
    }
}
