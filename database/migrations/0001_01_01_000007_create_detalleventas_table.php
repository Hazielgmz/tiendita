<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id(); // ID del detalle de venta
            $table->bigInteger('venta_id')->unsigned(); // ID de la venta
            $table->string('producto_ids'); // Campo para almacenar múltiples IDs de producto
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}