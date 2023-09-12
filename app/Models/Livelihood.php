<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Livelihood
 *
 * @property int $id
 * @property int $user_id
 * @property int $owner_info_id
 * @property string|null $source_of_income
 * @property string|null $gear_used
 * @property string|null $culture_method
 * @property string|null $specify
 * @property string|null $other_income_sources
 * @property string|null $gear_used_os
 * @property string|null $culture_method_os
 * @property string|null $specify_os
 * @property string|null $org_name
 * @property string|null $member_since
 * @property string|null $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OwnerInfo $ownerInfo
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood query()
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereCultureMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereCultureMethodOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereGearUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereGearUsedOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereMemberSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereOrgName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereOtherIncomeSources($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereOwnerInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereSourceOfIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereSpecify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereSpecifyOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livelihood whereUserId($value)
 * @mixin \Eloquent
 */
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
