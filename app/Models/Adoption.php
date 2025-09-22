<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'status', // pending, approved, rejected
        'message',
        'admin_notes',
        'adopted_at'
    ];

    protected $casts = [
        'adopted_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Status methods
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    // Scopes
    public static function pending()
    {
        return static::where('status', 'pending');
    }

    public static function approved()
    {
        return static::where('status', 'approved');
    }
}
