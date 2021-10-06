<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KomplektTypeTable extends Migration
{
    public function up()
    {
        Schema::create('komplekt_type', function (Blueprint $table) {
            $table->id();
            $table->integer('komplekt_id');
            $table->integer('type_id');
        });
    }

    public function down()
    {
        //
    }
}
