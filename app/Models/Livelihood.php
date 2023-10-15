<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livelihood extends Model
{
    use HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ownerInfo()
    {
        return $this->belongsTo(OwnerInfo::class);
    }
}
