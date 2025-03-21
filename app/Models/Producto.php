<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'producto';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_barras',
        'nombre_producto',
        'proveedor_id',
        'stock',
        'imagen_url',
        'precio_unitario',
        'costo',
        'tipo',
        'estado',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'costo' => 'decimal:2',
        'stock' => 'integer',
        'estado' => 'string',
    ];

    /**
     * Get the proveedor that owns the producto.
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}