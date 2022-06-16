<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('institute_id')->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');  
        });

    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
