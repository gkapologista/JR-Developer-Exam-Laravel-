<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    // Relationship: A Barangay belongs to a City
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Relationship: A Barangay has many Patients
    public function patients()
    {
        return $this->hasMany(Patient::class, 'brgy_id');
    }
}
