<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoTable extends Migration
{
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('pago');
    }
}