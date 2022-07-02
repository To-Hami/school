<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProblemsTable extends Migration
{

    public function up()
    {
        Schema::create('student_problems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('problem_id');
            $table->unsignedBigInteger('student_id');
            $table->text('Notes')->nullable();
            $table->text('Time')->nullable();
            $table->timestamps();


            // foreign keys
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('student_problems');
    }
}
