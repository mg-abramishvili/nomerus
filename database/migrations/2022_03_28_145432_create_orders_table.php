<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->integer('city_id');
            $table->string('uid');
            $table->string('client_type');
            $table->string('name')->nullable();
            $table->string('tel');
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
