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
}
