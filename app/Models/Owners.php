<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owners extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $dates = [
        'birthdate',
        'member_since',
        'resident_since',
    ];

    public function registration()
    {
        return $this->belongsTo(RegisterBoat::class, 'register_boat_id');
    }
}
