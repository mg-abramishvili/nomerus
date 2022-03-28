<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->string('transport');
            $table->string('plate');
            $table->string('number');
            $table->integer('price');
            $table->string('uid');
            $table->boolean('zhirniy');
            $table->boolean('bez_otverstiy');
            $table->boolean('komplekt');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
