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
            $table->date('fecha');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->String('motivo');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
