<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorServices extends Model
{
    use HasFactory;

    protected $guarded = [];

     //reverse relation with  doctor table
     public function Doctor()
     {
         $this->belongsTo(Doctor::class, 'doctor_id');
     }

     // relation with services fields table
    public function DoctorServicesFields()
    {
        $this->hasMany(DoctorServicesFields::class, 'sevice_id');
    }
  
}
