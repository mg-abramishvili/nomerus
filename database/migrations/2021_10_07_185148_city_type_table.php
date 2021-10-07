<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CityTypeTable extends Migration
{
    public function up()
    {
        Schema::create('city_type', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->integer('type_id');
            $table->decimal('price');
            $table->decimal('komplekt_price');
            $table->decimal('komplekt_same_type_price');
        });
    }

    public function down()
    {
        //
    }
}
