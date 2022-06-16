<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('datetime');
            $table->string('table', 30);
            $table->enum('action', ['I', 'A', 'E']);
            $table->text('message', 500);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ip');
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
