<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalkInBoatOwner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'salutation',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'address',
        'resident_since',
        'nationality',
        'gender',
        'civil_status',
        'contact_no',
        'birthdate',
        'age',
        'birthplace',
        'educ_background',
        'children_count',
        'emContact_person',
        'emRelationship',
        'emContact_no',
        'emAddress',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'resident_since' => 'datetime:Y-m',
    ];

    public function getFullNameAttribute()
    {
        $parts = [$this->salutation, $this->first_name];

        // Check if middle_name is not empty
        if (!empty($this->middle_name)) {
            // Get the first letter of middle_name and add a period
            $middleInitial = substr($this->middle_name, 0, 1) . '.';
            // Add the middleInitial to the parts array
            $parts[] = $middleInitial;
        }

        $parts[] = $this->last_name;
        $parts[] = $this->suffix;

        $nonEmptyParts = array_filter($parts, function ($part) {
            return !empty($part);
        });

        return implode(' ', $nonEmptyParts);
    }

    public function walkInLivelihood()
    {
        return $this->hasOne(WalkInLivelihood::class);
    }

    public function walkInAdss()
    {
        return $this->hasOne(WalkInAdss::class);
    }

    public function boats()
    {
        return $this->hasMany(Boat::class);
    }
}
