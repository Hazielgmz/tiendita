<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_barras', 50);
            $table->string('nombre_producto', 100);
            $table->bigInteger('proveedor_id')->unsigned();
            $table->integer('stock');
            $table->String('imagen_url');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('costo', 10, 2)->nullable();
            $table->string('tipo', 50)->nullable();
            $table->string('estado', 20)->default('activo');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('producto');
    }
}