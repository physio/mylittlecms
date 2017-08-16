<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsAndRelatorsTable extends Migration
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
            $table->string('slug')->default('');
            $table->text('description')->nullable();
            $table->string('image')->nullable()->default('/images/no-image.jpg');
            $table->string('address')->nullable();
            $table->datetime('dateStart')->nullable();
            $table->datetime('dateEnd')->nullable();
            $table->boolean('published')->default(1);
            $table->string('registration')->nullable();

        });


        Schema::create('relators', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('surname');
            $table->string('name');
            $table->text('cv');
            $table->string('photo');
            $table->boolean('published')->default(1);
        });


        Schema::create('event_relator', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->integer('relator_id')->unsigned()->index();
            $table->foreign('relator_id')->references('id')->on('relators')->onDelete('cascade');
            $table->primary(['event_id', 'relator_id']);
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
