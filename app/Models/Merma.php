<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merma extends Model
{

    protected $table = 'merma';

    protected $fillable = [
        'producto_id',
        'cantidad',
        'motivo',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
