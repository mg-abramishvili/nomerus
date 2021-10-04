<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransportTypesTable extends Migration
{
    public function up()
    {
        Schema::create('transport_type', function (Blueprint $table) {
            $table->id();
            $table->integer('transport_id');
            $table->integer('type_id');
        });
    }

    public function down()
    {
        //
    }
}
