<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentiAmministrazioneTrasparenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trasparentAdminDocs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->json('protocol')->nullable();
            $table->text('attachment');
            $table->integer('trasparentAdminItem_id')->unsigned()->index();
            $table->foreign('trasparentAdminItem_id')->references('id')->on('trasparentAdminItems')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);                
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trasparentAdminDocs');
    }
}
