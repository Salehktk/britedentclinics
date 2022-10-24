<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** 
     * Define relationships array
     */
    protected $with = ['DoctorAvailableTime', 'DoctorSpecialization'];

    //reverse relation with user table
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relation with services table
    public function DoctorSpecialization()
    {
        return $this->hasMany(DoctorSpecialization::class, 'doctor_id');
    }

    //reverce relation with services fields table
    public function DoctorSpecializationService()
    {
        return $this->belongsTo(DoctorSpecializationService::class, 'specialization_id');
    }

    public function DoctorAvailableTime()
    {
        return $this->hasMany(AvailableTime::class);
    }
}
