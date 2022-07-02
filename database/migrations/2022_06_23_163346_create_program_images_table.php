<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramImagesTable extends Migration
{

    public function up()
    {
        Schema::create('program_images', function (Blueprint $table) {
            $table->id();
            $table->string('images');
            $table->bigInteger('images_id')->unsigned();

            $table->timestamps();
            $table->foreign('images_id')->references('id')->on('programs')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('program_images');
    }
}
