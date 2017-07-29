<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable()->default('/images/no-image.jpg');
            $table->string('address')->nullable();
            $table->datetime('dateStart')->nullable();
            $table->datetime('dateEnd')->nullable();
            $table->boolean('published')->default(1);
            $table->string('registration')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
