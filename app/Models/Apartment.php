<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'street',
        'houseNumber',
        'salary',
        'created_at',
        'updated_at'
    ];
}
