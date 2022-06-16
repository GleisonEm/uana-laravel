<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{

    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_sender')->unsigned();
            $table->foreign('user_sender')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_receiver')->unsigned();
            $table->foreign('user_receiver')->references('id')->on('users')->onDelete('cascade');
            $table->text('message', 500);
            $table->datetime('datetime');
            $table->enum('status', ['A', 'L']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
