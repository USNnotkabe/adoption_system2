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
    ];

}