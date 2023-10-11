<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'owner_id',
        'register_boat_id',
        'vessel_name',
        'image',
        'boat_type',
        'home_port',
        'place_built',
        'year_built',
        'engine_make',
        'serial_number',
        'horsepower',
        'body_number',
        'color',
        'length',
        'breadth',
        'tonnage_length',
        'tonnage_breadth',
        'tonnage_depth',
        'gross_tonnage',
        'net_tonnage',
        'depth',
        'materials',
    ];

    public function owner()
    {
        return $this->belongsTo(OwnerInfo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerBoat()
    {
        return $this->belongsTo(Boat::class);
    }

    public function walkIn()
    {
        return $this->belongsTo(WalkInBoatOwner::class);
    }
}
