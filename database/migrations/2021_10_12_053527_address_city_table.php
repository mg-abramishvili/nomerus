<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddressCityTable extends Migration
{
    public function up()
    {
        Schema::create('address_city', function (Blueprint $table) {
            $table->id();
            $table->integer('address_id');
            $table->integer('city_id');
        });
    }

    public function down()
    {
        //
    }
}
