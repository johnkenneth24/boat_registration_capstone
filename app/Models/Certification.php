<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        "certificate_no",
        "register_boat_id",
    ];

    public function registerBoat()
    {
        return $this->belongsTo(RegisterBoat::class);
    }
}
