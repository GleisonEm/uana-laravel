<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('password');
            $table->string('avatar')->default('default.png');
            $table->integer('assignment_id')->unsigned();
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->string('path_signature')->nullable();
            $table->string('block');
            $table->integer('institute_id')->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->string('tags')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');            
        });

        Schema::create('course_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_user');
        Schema::dropIfExists('users');
    }
}
