<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_duration',
        'no_of_student_allow',
        'course_start_date',
        'passing_percentage',
        'course_retakes',
        'price',
        'file',
        'description',
        'sale_price',
        'total_marks',
    ];

}
