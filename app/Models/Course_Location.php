<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id',
        'course_id',
    ];

    public function course_name()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    
    public function location_name()
    {
        return $this->belongsTo(Location::class,'location_id');
    }
}
