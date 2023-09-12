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
        'boat_type',
        'horsepower',
        'vessel_name',
        'color',
        'length',
        'breadth',
        'depth',
        'body_number',
        'materials',
        'year_built',
        'gross_tonnage',
    ];

    public function owner()
    {
        return $this->belongsTo(OwnerInfo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
