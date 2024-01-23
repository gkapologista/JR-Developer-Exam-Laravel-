<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brgy_id', 'number', 'email', 'case_type', 'coronavirus_status'];

    // Relationship: A Patient belongs to a Barangay
    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'brgy_id');
    }
}
