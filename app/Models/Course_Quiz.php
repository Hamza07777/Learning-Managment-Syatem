<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'quiz_id',
    ];
    public function course_nameee()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function quiz_name()
    {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }
}
