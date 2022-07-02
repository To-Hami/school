<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{

    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('manager_name');
            $table->string('manager_phone');
            $table->string('manager_email');
            $table->string('history');
            $table->string('number');
            $table->string('grade');
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('history');
    }
}
