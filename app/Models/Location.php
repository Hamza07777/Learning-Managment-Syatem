<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'description',
        'file',
    ];
    public function course_location_location()
    {
        return $this->hasMany(Course_Location::class,'location_id');
    }
}
