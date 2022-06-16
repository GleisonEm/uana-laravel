<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{

    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('key', 7);
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');  
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
