<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalle_ventas';

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
        'venta_id',
        'producto_ids', // Campo para almacenar múltiples IDs de producto
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'producto_ids' => 'string', // Tratado como cadena
    ];

    /**
     * Get the venta that owns the detalle venta.
     */
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }
}