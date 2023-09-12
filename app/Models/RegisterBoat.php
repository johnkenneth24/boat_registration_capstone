<?php

namespace App\Models;

use App\Models\OwnerInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\RegisterBoat
 *
 * @property int $id
 * @property int $user_id
 * @property string $registration_no
 * @property string $registration_date
 * @property string $registration_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $owner_info_id
 * @property-read \App\Models\Boat|null $boat
 * @property-read OwnerInfo|null $ownerInfo
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereOwnerInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereRegistrationNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereRegistrationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat withoutTrashed()
 * @mixin \Eloquent
 */
class RegisterBoat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $dates = [
        'registration_date' => 'date',
    ];

    public function ownerInfo()
    {
        return $this->belongsTo(OwnerInfo::class);
    }

    public function boat()
    {
        return $this->hasOne(Boat::class);
    }
}
