<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->string('transport');
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
