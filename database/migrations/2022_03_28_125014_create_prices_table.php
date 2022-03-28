<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('plate_id');
            $table->integer('city_id');
            $table->integer('odin');
            $table->integer('komplekt')->nullable();
            $table->integer('zhirniy')->nullable();
            $table->integer('zhirniy_komplekt')->nullable();
            $table->integer('bez_otverstiy')->nullable();
            $table->integer('bez_otverstiy_komplekt')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
