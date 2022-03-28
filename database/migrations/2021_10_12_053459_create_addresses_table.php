<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('name');
            $table->string('tel');
            $table->string('coordinates');
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
