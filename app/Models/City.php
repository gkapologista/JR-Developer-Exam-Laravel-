<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = ['name'];

    // Relationship: A City has many Barangays
    public function barangays()
    {
        return $this->hasMany(Barangay::class);
    }
}
