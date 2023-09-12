<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Boat
 *
 * @property int $id
 * @property int $user_id
 * @property int $owner_id
 * @property string $boat_type
 * @property string|null $horsepower
 * @property string $vessel_name
 * @property string $color
 * @property string $length
 * @property string $breadth
 * @property string $depth
 * @property string $body_number
 * @property string $materials
 * @property string $year_built
 * @property string $gross_tonnage
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $register_boat_id
 * @property-read \App\Models\OwnerInfo $owner
 * @property-read Boat|null $registerBoat
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Boat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boat onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Boat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereBoatType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereBodyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereBreadth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereGrossTonnage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereHorsepower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereMaterials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereRegisterBoatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereVesselName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereYearBuilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Boat withoutTrashed()
 * @mixin \Eloquent
 */
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

    public function registerBoat()
    {
        return $this->belongsTo(Boat::class);
    }

}
