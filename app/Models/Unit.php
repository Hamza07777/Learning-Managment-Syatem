<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_description',
        'unit_type',
        'duration',
        'access_date',
        'access_time',
        'course_id',
    ];

    public function unit_course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
