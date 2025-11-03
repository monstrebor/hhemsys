<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdUser extends Model
{
    use HasFactory;

    protected $table = 'household_user'; 
    protected $fillable = [
        'household_id',
        'user_id',
        'relation',
        'is_owner', 
        'role',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
