<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CityOrderTable extends Migration
{
    public function up()
    {
        Schema::create('city_order', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->integer('order_id');
        });
    }

    public function down()
    {
        //
    }
}