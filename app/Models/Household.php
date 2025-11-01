<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'expected_monthly_income',
        'description',
        'user_id',
        'invite_code',
    ];

    protected static function booted()
    {
        static::creating(function ($household) {
            if (!$household->invite_code) {
                $household->invite_code = strtoupper(Str::random(8)); 
            }
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('relation', 'expected_cash')
            ->withTimestamps();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
