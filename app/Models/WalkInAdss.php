<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalkInAdss extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'walkin_owner_adss_id',
        'name_spouse',
        'number_dependent',
        'name_employer',
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
        'cover_to' => 'date'
    ];

    public function walkInBoatOwnerAdss()
    {
        return $this->belongsTo(WalkinBoatowner::class);
    }
}
