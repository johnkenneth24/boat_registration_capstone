<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'id_number',
        'contact_no',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function ownerInfo()
    {
        return $this->hasOne(OwnerInfo::class);
    }

    public function boat()
    {
        return $this->hasMany(Boat::class);
    }

    public function livelihood()
    {
        return $this->hasOneThrough(Livelihood::class, OwnerInfo::class);
    }

    // public function role()
    // {
    //     return $this->hasOne(Role::class);
    // }
}
