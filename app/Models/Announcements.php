<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcements extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $casts = [
        'date' => 'date',
    ];
    // protected $dates = ['date'];
}
