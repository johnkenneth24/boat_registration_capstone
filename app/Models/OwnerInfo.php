<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\OwnerInfo
 *
 * @property int $id
 * @property int $user_id
 * @property string $salutation
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string|null $suffix
 * @property string $address
 * @property \Illuminate\Support\Carbon $resident_since
 * @property string $nationality
 * @property string $gender
 * @property string $civil_status
 * @property string $contact_no
 * @property \Illuminate\Support\Carbon $birthdate
 * @property int $age
 * @property string $birthplace
 * @property string $educ_background
 * @property int|null $children_count
 * @property string|null $emContact_person
 * @property string|null $emRelationship
 * @property string|null $emContact_no
 * @property string|null $emAddress
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $other_educational_background
 * @property-read \App\Models\Boat|null $boat
 * @property-read mixed $full_name
 * @property-read \App\Models\Livelihood|null $livelihood
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RegisterBoat> $registerBoat
 * @property-read int|null $register_boat_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereBirthplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereChildrenCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereCivilStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereEducBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereEmAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereEmContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereEmContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereEmRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereOtherEducationalBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereResidentSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo withoutTrashed()
 * @mixin \Eloquent
 */
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
        'resident_since' => 'datetime:Y-m',
    ];

    public function getFullNameAttribute()
    {
        $parts = [$this->salutation, $this->first_name];

        // Check if middle_name is not empty
        if (!empty($this->middle_name)) {
            // Get the first letter of middle_name and add a period
            $middleInitial = substr($this->middle_name, 0, 1) . '.';
            // Add the middleInitial to the parts array
            $parts[] = $middleInitial;
        }

        $parts[] = $this->last_name;
        $parts[] = $this->suffix;

        $nonEmptyParts = array_filter($parts, function ($part) {
            return !empty($part);
        });

        return implode(' ', $nonEmptyParts);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }

    public function livelihood()
    {
        return $this->hasOne(Livelihood::class);
    }

    public function registerBoat()
    {
        return $this->hasMany(RegisterBoat::class);
    }
}
