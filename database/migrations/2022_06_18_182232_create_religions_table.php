<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligionsTable extends Migration
{

    public function up()
    {
        Schema::create('religions', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('religions');
    }
}
