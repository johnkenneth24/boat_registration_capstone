<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Adss
 *
 * @property int $id
 * @property int $owner_info_id
 * @property string $spouse_name
 * @property string $number_dependent
 * @property string $employer_name
 * @property string $desired_coverage
 * @property string $premium
 * @property \Illuminate\Support\Carbon $cover_from
 * @property \Illuminate\Support\Carbon $cover_to
 * @property string|null $primary_beneficiary
 * @property string|null $primary_relationship
 * @property string|null $secondary_beneficiary
 * @property string|null $secondary_relationship
 * @property string|null $minor_trustee
 * @property string|null $pcic_coverage
 * @property string|null $pcic_name
 * @property string|null $pcic_relationship
 * @property string|null $pcic_address
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OwnerInfo $owner_info
 * @method static \Illuminate\Database\Eloquent\Builder|Adss newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adss newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adss onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Adss query()
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereCoverFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereCoverTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereDesiredCoverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereEmployerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereMinorTrustee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereNumberDependent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereOwnerInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePcicAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePcicCoverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePcicName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePcicRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePrimaryBeneficiary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss wherePrimaryRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereSecondaryBeneficiary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereSecondaryRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereSpouseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adss withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Adss withoutTrashed()
 */
	class Adss extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Announcements extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Boat
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $owner_id
 * @property int|null $register_boat_id
 * @property string $boat_type
 * @property string|null $image
 * @property string $vessel_name
 * @property string $color
 * @property string $length
 * @property string $breadth
 * @property string $depth
 * @property string $body_number
 * @property string|null $horsepower
 * @property string $materials
 * @property string $year_built
 * @property string $gross_tonnage
 * @property string $home_port
 * @property string $place_built
 * @property string|null $engine_make
 * @property string|null $serial_number
 * @property string $tonnage_length
 * @property string $tonnage_breadth
 * @property string $tonnage_depth
 * @property string $net_tonnage
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OwnerInfo $owner
 * @property-read Boat|null $registerBoat
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\WalkInBoatOwner|null $walkIn
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
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereEngineMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereGrossTonnage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereHomePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereHorsepower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereMaterials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereNetTonnage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat wherePlaceBuilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereRegisterBoatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereTonnageBreadth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereTonnageDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereTonnageLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereVesselName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat whereYearBuilt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boat withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Boat withoutTrashed()
 */
	class Boat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Certification
 *
 * @property int $id
 * @property int $register_boat_id
 * @property string $certificate_no
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RegisterBoat $registerBoat
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCertificateNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereRegisterBoatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certification whereUpdatedAt($value)
 */
	class Certification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Livelihood
 *
 * @property int $id
 * @property int|null $user_id
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
 * @property-read \App\Models\User|null $user
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
 */
	class Livelihood extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OwnerInfo
 *
 * @property int $id
 * @property int|null $user_id
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
 * @property string|null $other_educational_background
 * @property int|null $children_count
 * @property string|null $emContact_person
 * @property string|null $emRelationship
 * @property string|null $emContact_no
 * @property string|null $emAddress
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Adss|null $adss
 * @property-read \App\Models\Boat|null $boat
 * @property-read mixed $full_name
 * @property-read \App\Models\Livelihood|null $livelihood
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RegisterBoat> $registerBoat
 * @property-read int|null $register_boat_count
 * @property-read \App\Models\User|null $user
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
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OwnerInfo withoutTrashed()
 */
	class OwnerInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RegisterBoat
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $owner_info_id
 * @property string $registration_no
 * @property string $registration_date
 * @property string $registration_type
 * @property string $status
 * @property string|null $approved_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Boat|null $boat
 * @property-read \App\Models\Certification|null $certification
 * @property-read \App\Models\OwnerInfo|null $ownerInfo
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterBoat whereApprovedAt($value)
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
 */
	class RegisterBoat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $id_number
 * @property string $name
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $contact_no
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Boat> $boat
 * @property-read int|null $boat_count
 * @property-read \App\Models\Livelihood|null $livelihood
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\OwnerInfo|null $ownerInfo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WalkInAdss
 *
 * @property-read \App\Models\WalkInBoatOwner|null $walkInBoatOwnerAdss
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInAdss newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInAdss newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInAdss onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInAdss query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInAdss withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInAdss withoutTrashed()
 */
	class WalkInAdss extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WalkInBoatOwner
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WalkInBoatRegistration> $WalkInRegBoat
 * @property-read int|null $walk_in_reg_boat_count
 * @property-read mixed $full_name
 * @property-read \App\Models\WalkInAdss|null $walkInAdss
 * @property-read \App\Models\WalkInLivelihood|null $walkInLivelihood
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatOwner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatOwner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatOwner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatOwner query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatOwner withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatOwner withoutTrashed()
 */
	class WalkInBoatOwner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WalkInBoatRegistration
 *
 * @property-read \App\Models\WalkInBoatOwner|null $walkInRegBoatOwner
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatRegistration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatRegistration query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatRegistration withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInBoatRegistration withoutTrashed()
 */
	class WalkInBoatRegistration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WalkInLivelihood
 *
 * @property-read \App\Models\WalkInBoatOwner|null $walkInBoatOwnerLivelihood
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInLivelihood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInLivelihood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInLivelihood onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInLivelihood query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInLivelihood withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkInLivelihood withoutTrashed()
 */
	class WalkInLivelihood extends \Eloquent {}
}

