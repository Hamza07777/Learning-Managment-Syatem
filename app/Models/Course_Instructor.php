<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Instructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'user_id',
    ];

    public function course_name()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function instructor_name()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
