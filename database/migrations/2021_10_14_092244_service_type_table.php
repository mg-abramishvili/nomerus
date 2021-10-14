<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceTypeTable extends Migration
{
    public function up()
    {
        Schema::create('service_type', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('type_id');
        });
    }

    public function down()
    {
        //
    }
}
