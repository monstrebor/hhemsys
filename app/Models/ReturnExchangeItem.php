<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnExchangeItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'return_exchange_id',
        'product_id',
        'quantity',
        'exchanged_product_id',
    ];

    public function returnExchange()
    {
        return $this->belongsTo(ReturnExchange::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function exchangedProduct()
    {
        return $this->belongsTo(Product::class, 'exchanged_product_id');
    }
}
