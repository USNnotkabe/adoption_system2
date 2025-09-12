<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'age',
        'birth_date',
        'breed',
        'gender',
        'color',
        'description',
        'allergies',
        'disabilities',
        'medication',
        'food_diet',
        // 'status',
    ];
}
//     const STATUS_AVAILABLE = 'available';
//     const STATUS_ADOPTED = 'adopted';
//     const STATUS_PENDING = 'pending';
//     const STATUS_FOSTERED = 'unavailable';

//     public function getStatuses()
//     {
//         return [
//             self::STATUS_AVAILABLE => 'Available',
//             self::STATUS_ADOPTED => 'Adopted',
//             self::STATUS_PENDING => 'Pending',
//             self::STATUS_UNAVAILABLE => 'Unavailable',
//         ];
//     }
//     public function getStatusLabelAttribute(): string
//     {
//         $statuses = self::getStatuses();
//         return $statuses[$this->status] ?? 'Unknown';
//     }
// }

//     public function getStatusColorAttribute(): string
//     {
//         return match ($this->status) {
//             self::STATUS_AVAILABLE => '#4CAF50',      // Green
//             self::STATUS_ADOPTED => '#2196F3',        // Blue
//             self::STATUS_PENDING => '#FF9800',        // Orange
//             self::STATUS_UNAVAILABLE => '#F44336',    // Red
//             default => '#757575'
//         };
//     }
//         public function scopeAvailable($query)
//         {
//             return $query->where('status', self::STATUS_AVAILABLE);
//         }

//         public function scope
// }