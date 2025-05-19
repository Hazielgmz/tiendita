<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    public function up()
    {
         Schema::create('detalleventa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('venta')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('producto')->onDelete('restrict');
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalleventa');
    }
}