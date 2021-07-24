<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'assignment_id',
    ];
    public function course_nameee()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function assignment_name()
    {
        return $this->belongsTo(Assignment::class,'assignment_id');
    }
}
