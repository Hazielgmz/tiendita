<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->BigInteger('pago_id')->unsigned();
            $table->decimal('total', 10, 2);
            $table->timestamp('fecha');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pago_id')->references('id')->on('pago')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta');
    }
}