<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OwnerInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }

}
