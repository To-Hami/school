<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('address')->nullable();
            $table->string('Id_Number')->unique()->nullable();
            $table->string('jop')->nullable();
            $table->bigInteger('Grade_id')->unsigned()->nullable();;
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');






            // $table->string('email')->unique();
            // $table->bigInteger('gender_id')->unsigned();
           // $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
           // $table->bigInteger('nationalitie_id')->unsigned();
           // $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->bigInteger('blood_id')->unsigned()->nullable();
            $table->foreign('blood_id')->references('id')->on('type__bloods')->onDelete('cascade');
            $table->string('Date_Birth')->nullable();;

            $table->bigInteger('Classroom_id')->unsigned()->nullable();;
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->bigInteger('level_id')->unsigned()->nullable();;
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->bigInteger('section_id')->unsigned()->nullable();;
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            //$table->bigInteger('parent_id')->unsigned();
          //  $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade');
            $table->string('academic_year')->nullable();;
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('students');
    }
}
