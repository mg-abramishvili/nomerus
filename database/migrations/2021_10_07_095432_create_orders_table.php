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
            $table->decimal('price');
            $table->string('uid');
            $table->string('client_type');
            $table->string('name')->nullable();
            $table->string('tel');
            $table->string('email');
            $table->string('passport')->nullable();
            $table->string('company')->nullable();
            $table->string('inn')->nullable();
            $table->string('kpp')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('uraddress')->nullable();
            $table->string('faktaddress')->nullable();
            $table->string('ras_schet')->nullable();
            $table->string('bank')->nullable();
            $table->string('bik')->nullable();
            $table->string('korr')->nullable();
            $table->string('director')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
