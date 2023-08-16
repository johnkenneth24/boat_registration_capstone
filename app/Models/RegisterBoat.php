<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterBoat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $date = [
        'registration_date',
        'birthdate',
    ];

    public function owner()
    {
        return $this->hasOne(Owner::class, 'register_boat_id');
    }
}
