<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    public function up()
    {
        Schema::create('detalleventas', function (Blueprint $table) {
            $table->id();
            
            // Usamos foreignId para que concuerde con bigIncrements en 'venta'
            $table->foreignId('venta_id')
                  ->constrained('venta')    // <<< aquí singular, igual que tu tabla
                  ->onDelete('cascade');
    
            $table->string('producto_ids');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalleventas');
    }
}