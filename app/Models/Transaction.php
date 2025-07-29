<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'rider_id',
        'total_price',
        'delivery_fee',
        'is_cod',
        'is_paid',
        'paid_at',
    ];

    protected $casts = [
        'is_cod' => 'boolean',
        'is_paid' => 'boolean',
        'paid_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function rider()
    {
        return $this->belongsTo(User::class, 'rider_id');
    }
}
