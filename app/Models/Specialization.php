<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** 
     * Define relationships array
     */
    protected $with = ['services'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
