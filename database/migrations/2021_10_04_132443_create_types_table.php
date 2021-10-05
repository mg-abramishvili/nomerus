<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('namecode');
            $table->boolean('flag')->nullable();
            $table->decimal('price');
            $table->decimal('komplekt_price')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}
