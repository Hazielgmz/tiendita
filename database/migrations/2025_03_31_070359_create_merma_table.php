<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merma', function (Blueprint $table) {
            $table->id();
            // FK a productos.id
            $table->foreignId('producto_id')
                  ->constrained('producto')
                  ->onDelete('cascade');
            $table->integer('cantidad');
            $table->text('motivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merma');
    }
};
