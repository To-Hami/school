<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{

    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('genders');
    }
}
