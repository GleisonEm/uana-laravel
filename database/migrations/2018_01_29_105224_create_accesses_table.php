<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTable extends Migration
{

    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('datetime');
            $table->string('ip');
            $table->enum('action', ['E', 'S']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('accesses');
    }
}
