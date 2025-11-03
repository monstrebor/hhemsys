<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_new',
        'status',
        'invite_code',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            if (!$user->invite_code) {
                $user->invite_code = strtoupper(Str::random(8));
            }
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function households()
    {
        return $this->belongsToMany(Household::class, 'household_user', 'user_id', 'household_id')
            ->withPivot('relation', 'is_owner', 'role')
            ->withTimestamps();
    }

    public function ownedHousehold()
    {
        return $this->households()->wherePivot('is_owner', true);
    }

}
