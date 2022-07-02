<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{

    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date');
            $table->text('details');
            $table->text('video');
            $table->text('manager');
            $table->text('support');
            $table->text('targets');
            $table->timestamps();


        });
    }


    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
