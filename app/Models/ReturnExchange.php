<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnExchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'walkin_id',
        'type',           
        'reason',
        'status',
        'processed_by',
    ];

    public function walkin()
    {
        return $this->belongsTo(Walkin::class);
    }

    public function items()
    {
        return $this->hasMany(ReturnExchangeItem::class);
    }

    public function processedBy()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
