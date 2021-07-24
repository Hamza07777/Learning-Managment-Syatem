<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Course_Assignment_Marks extends Model
{
    use HasFactory;
    public function course_nameee()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function assignment_name()
    {
        return $this->belongsTo(Assignment::class,'assignment_id');
    }
    public function User_name()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
