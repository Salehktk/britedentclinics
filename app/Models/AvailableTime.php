<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** 
     * Define relationships array
     */
    protected $with = [];

    public function DoctorAvailableTimeSlot()
    {
        return $this->hasMany(TimeSlot::class, 'available_times_id');
    }

    public function DoctorReverse()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
