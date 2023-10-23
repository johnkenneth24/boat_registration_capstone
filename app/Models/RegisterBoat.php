<?php

namespace App\Models;

use App\Models\OwnerInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterBoat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'registration_no',
        'registration_date',
        'owner_info_id',
        'registration_type',
    ];

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

    public function certification()
    {
        return $this->hasOne(Certification::class);
    }
}
