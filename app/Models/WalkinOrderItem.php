<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkinOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'walkin_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function walkin()
    {
        return $this->belongsTo(Walkin::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
