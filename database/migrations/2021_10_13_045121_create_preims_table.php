<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreimsTable extends Migration
{
    public function up()
    {
        Schema::create('preims', function (Blueprint $table) {
            $table->id();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('preims');
    }
}
