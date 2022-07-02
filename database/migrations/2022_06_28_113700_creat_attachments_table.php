<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatAttachmentsTable extends Migration
{

    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);
            $table->unsignedBigInteger('attachment_id')->nullable();
            $table->foreign('attachment_id')->references('id')->on('books')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
}
