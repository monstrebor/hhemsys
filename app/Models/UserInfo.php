<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'date_of_birth',
        'phone_number',
        'street',
        'city',
        'province',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
