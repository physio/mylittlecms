<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeShifts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('weekDay_id')->unsigned()->index();
            $table->foreign('weekDay_id')->references('id')->on('week_days')->onDelete('cascade');
            $table->time('start');
            $table->time('stop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('office_shifts');
    }
}
