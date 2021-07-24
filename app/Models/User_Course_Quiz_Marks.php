<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Course_Quiz_Marks extends Model
{
    use HasFactory;
    public function course_nameee()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function quiz_name()
    {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }
    public function User_name()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
