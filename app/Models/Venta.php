<?php
 namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model {

    use HasFactory;

    @var string
    protected $table = 'venta';
    @var string
    protected $primaryKey = 'id';
    @var array
    protected $fillable = [
        'users_id',
        'pago_id',
        'total',
        'fecha',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'fecha' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_venta', 'venta_id', 'producto_id')
            ->withPivot('cantidad', 'precio_unitario', 'subtotal')
            ->withTimestamps();
    }

}
