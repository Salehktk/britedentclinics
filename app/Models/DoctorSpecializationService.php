<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpecializationService extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** 
     * Define relationships array
     */
    protected $with = ['services'];

    //reverse relation with  fields table
    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
