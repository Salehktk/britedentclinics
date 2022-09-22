<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

   //reverse relation with user table
    public function User()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    // relation with services table
    public function DoctorServices()
    {
        $this->hasMany(DoctorServices::class, 'doctor_id');
    }

    //reverce relation with services fields table
    public function DoctorServicesFields()
    {
        $this->belongsTo(DoctorServicesFields::class, 'sevice_id');
    }
}
