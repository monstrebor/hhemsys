<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'expected_monthly_income',
        'description',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'household_user', 'household_id', 'user_id')
            ->withPivot('relation', 'is_owner', 'role')
            ->withTimestamps();
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}

