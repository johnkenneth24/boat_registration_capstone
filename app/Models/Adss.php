<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adss extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_info_id',
        'spouse_name',
        'number_dependent',
        'employer_name',
        'desired_coverage',
        'premium',
        'cover_from',
        'cover_to',
        'primary_beneficiary',
        'primary_relationship',
        'secondary_beneficiary',
        'secondary_relationship',
        'minor_trustee',
        'pcic_coverage',
        'pcic_name',
        'pcic_relationship',
        'pcic_address'
    ];

    protected $casts = [
        'cover_from' => 'date',
        'cover_to' => 'date',
    ];

    public function owner_info()
    {
        return $this->belongsTo(OwnerInfo::class);
    }
}
