<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'payment_status',
        'total_amount',
        'receipt_number',
        'created_by',
    ];

    public function items()
    {
        return $this->hasMany(WalkinOrderItem::class);
    }

    public function transaction()
    {
        return $this->hasOne(WalkinTransaction::class);
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function returnExchanges()
    {
        return $this->hasMany(ReturnExchange::class);
    }
}
