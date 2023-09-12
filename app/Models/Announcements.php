<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Announcements
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcements withoutTrashed()
 * @mixin \Eloquent
 */
class Announcements extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $casts = [
        'date' => 'date',
    ];
    // protected $dates = ['date'];
}
