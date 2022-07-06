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
            $table->string('name')->nullable();
            $table->string('date')->nullable();
            $table->text('details')->nullable();
            $table->text('video')->nullable();
            $table->text('manager')->nullable();
            $table->text('support')->nullable();
            $table->text('targets')->nullable();
            $table->timestamps();


        });
    }


    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
