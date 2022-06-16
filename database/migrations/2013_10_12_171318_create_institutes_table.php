<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration
{
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');  
        });
    }

    public function down()
    {
        Schema::dropIfExists('institutes');
    }
}
