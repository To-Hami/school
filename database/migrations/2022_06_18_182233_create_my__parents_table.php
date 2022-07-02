<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{

    public function up()
    {
        Schema::create('my__parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('Name_Father');
            $table->string('National_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->bigInteger('Nationality_Father_id')->unsigned();
            $table->bigInteger('Blood_Type_Father_id')->unsigned();
            $table->bigInteger('Religion_Father_id')->unsigned();
            $table->string('Address_Father');
            $table->timestamps();



        });
    }


    public function down()
    {
        Schema::dropIfExists('my__parents');
    }
}
