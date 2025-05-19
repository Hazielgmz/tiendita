<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'venta';
    /** @var string */
    protected $primaryKey = 'id';
    /** @var array */
    protected $fillable = [
        'users_id',
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

   
}