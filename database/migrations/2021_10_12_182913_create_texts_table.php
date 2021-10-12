<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextsTable extends Migration
{
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->lognText('company_text');
            $table->lognText('privacy_policy');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('texts');
    }
}
