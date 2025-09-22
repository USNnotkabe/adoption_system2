<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'age',
        'breed',
        'color',
        'description',
        'birth_date',
        'gender',
        'allergies',
        'disabilities',
        'medication',
        'food_diet',
        'adoption_status',
        'user_id', // Foreign key to link pet to user
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'age' => 'integer',
        ];
    }

    /**
     * Check if pet is available for adoption
     */
    public function isAvailable(): bool
    {
        return $this->adoption_status === 'available';
    }

    /**
     * Check if pet is adopted
     */
    public function isAdopted(): bool
    {
        return $this->adoption_status === 'adopted';
    }

    /**
     * Get pets available for adoption
     */
    public static function available()
    {
        return static::where('adoption_status', 'available');
    }

    /**
     * Get adopted pets
     */
    public static function adopted()
    {
        return static::where('adoption_status', 'adopted');
    }
    public function adoptions()
{
    return $this->hasMany(Adoption::class);
}

/**
 * Get the current adopter (if adopted)
 */
public function adopter()
{
    return $this->belongsTo(User::class, 'user_id');
}

/**
 * Get pending adoption requests
 */
// public function pendingAdoptions()
// {
//     return $this->adoptions()->where('status', 'pending');
// }

/**
 * Check if pet has pending adoption requests
 */
public function hasPendingAdoptions()
{
    return $this->pendingAdoptions()->exists();
}

// In App\Models\User.php - add these relationships to your existing User class:

/**
 * Get all pets owned by this user (adopted pets)
 */
public function pets()
{
    return $this->hasMany(Pet::class);
}

/**
 * Get all adoption requests made by this user
 */
public function adoptionRequests()
{
    return $this->hasMany(Adoption::class);
}

/**
 * Get approved adoptions
 */
public function approvedAdoptions()
{
    return $this->adoptionRequests()->where('status', 'approved');
}

public function adoptionRequests()
{
    return $this->hasMany(AdoptionRequest::class);
}

}