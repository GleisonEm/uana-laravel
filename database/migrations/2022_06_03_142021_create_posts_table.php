<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->string('subtitulo', 100);
            $table->string('conteudo', 280);
            $table->string('tags', 500);
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('imagem');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');  
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
