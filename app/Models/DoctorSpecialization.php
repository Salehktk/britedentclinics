<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpecialization extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** 
     * Define relationships array
     */
    protected $with = [];

    //reverse relation with  doctor table
    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    //reverse relation with  services table
    public function Specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    // relation with services fields table
    public function DoctorSpecializationServices()
    {
        return $this->hasMany(DoctorSpecializationService::class, 'doctor_specialization_id');
    }
}
