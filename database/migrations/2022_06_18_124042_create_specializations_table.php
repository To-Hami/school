<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializationsTable extends Migration
{

    public function up()
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('grade_id')->default(1);
            $table->string('classroom_id')->default(1);
            $table->string('teacher_id')->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('specializations');
    }
}
