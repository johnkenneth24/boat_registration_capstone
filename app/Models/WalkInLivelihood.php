<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalkInLivelihood extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'source_of_income',
        'gear_used',
        'culture_method',
        'specify',
        'other_income_sources',
        'gear_used_os',
        'culture_method_os',
        'specify_os',
        'org_name',
        'member_since',
        'position',
    ];

    public function walkInBoatOwnerLivelihood()
    {
        return $this->belongsTo(WalkinBoatowner::class);
    }
}
