<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear un proveedor predeterminado (si no existe)
        $proveedor = Proveedor::firstOrCreate([
            'nombre' => 'Frutas S.A.',
            'direccion' => 'Calle Falsa 123',
            'telefono' => '123456789',
            'email' => 'frutas@example.com',
            'estado' => 'activo',
        ]);

        // Lista de frutas con sus detalles
        $frutas = [
            [
                'codigo_barras' => '1001 ',
                'nombre_producto' => 'Aguacate',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Aguacate.png',
                'precio_unitario' => 25.00,
                'costo' => 15.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1002',
                'nombre_producto' => 'Avena',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Avena.png',
                'precio_unitario' => 5.00,
                'costo' => 3.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1003',
                'nombre_producto' => 'Granola',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Granola.png',
                'precio_unitario' => 10.00,
                'costo' => 6.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1004',
                'nombre_producto' => 'Platano',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Platano.png',
                'precio_unitario' => 5.00,
                'costo' => 2.50,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1005',
                'nombre_producto' => 'Manzana',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Manzana.png',
                'precio_unitario' => 10.00,
                'costo' => 6.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1006',
                'nombre_producto' => 'Naranja',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Naranja.png',
                'precio_unitario' => 8.00,
                'costo' => 4.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1007',
                'nombre_producto' => 'Sandía',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Sandia.png',
                'precio_unitario' => 50.00,
                'costo' => 30.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1008',
                'nombre_producto' => 'Fresa',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Fresa.png',
                'precio_unitario' => 15.00,
                'costo' => 8.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1009',
                'nombre_producto' => 'Limon',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Limon.png',
                'precio_unitario' => 3.00,
                'costo' => 1.50,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1010',
                'nombre_producto' => 'Durazno',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Durazno.png',
                'precio_unitario' => 12.00,
                'costo' => 7.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1011',
                'nombre_producto' => 'Cereal_Froot_Loops',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Cereal_Froot_Loops.png',
                'precio_unitario' => 20.00,
                'costo' => 12.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1012',
                'nombre_producto' => 'Zanahoria',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Zanahoria.png',
                'precio_unitario' => 20.00,
                'costo' => 12.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1013',
                'nombre_producto' => 'Tomate',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Tomate.png',
                'precio_unitario' => 20.00,
                'costo' => 12.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1014',
                'nombre_producto' => 'Cebolla',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Cebolla.png',
                'precio_unitario' => 20.00,
                'costo' => 12.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1015',
                'nombre_producto' => 'Cereal_Zucaritas',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Cereal_Zucaritas.png',
                'precio_unitario' => 10.00,
                'costo' => 6.00,
                'tipo' => 'GR', // Granel
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '1016',
                'nombre_producto' => 'Lechuga',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => 'imagenes/Lechuga.png',
                'precio_unitario' => 20.00,
                'costo' => 12.00,
                'tipo' => 'GR', // Granel   
                'estado' => 'activo',
            ],
            [
                'codigo_barras' => '75007614',
                'nombre_producto' => 'Coca-Cola 600ml',
                'proveedor_id' => $proveedor->id,
                'stock' => 1000,
                'imagen_url' => '',
                'precio_unitario' => 20.00,
                'costo' => 12.00,
                'tipo' => 'PZ', // Pieza
                'estado' => 'activo',
            ],
           
        ];

        // Insertar los productos en la base de datos
        foreach ($frutas as $fruta) {
            Producto::create($fruta);
        }
    }
}