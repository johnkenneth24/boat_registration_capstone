<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalkInBoatRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'walkin_owner_id',
        'registration_no',
        'registration_date',
        'registration_type',
        'vessel_name',
        'vessel_type',
        'home_port',
        'image',
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

    protected $casts = [
        'registration_date' => 'date'
    ];

    public function walkInRegBoatOwner()
    {
        return $this->belongsTo(WalkInBoatOwner::class);
    }
}
