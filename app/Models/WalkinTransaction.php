<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkinTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'walkin_id',
        'amount',
        'payment_method',
        'is_paid',
        'paid_at',
    ];

    public function walkin()
    {
        return $this->belongsTo(Walkin::class);
    }
}
