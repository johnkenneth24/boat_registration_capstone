<?php

namespace App\Models;

use App\Models\OwnerInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterBoat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $dates = [
        'registration_date' => 'date',
    ];

    public function ownerInfo()
    {
        return $this->belongsTo(OwnerInfo::class);
    }

    public function boat()
    {
        return $this->hasOne(Boat::class);
    }
}
