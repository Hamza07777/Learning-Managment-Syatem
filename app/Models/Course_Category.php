<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'course_id',
    ];

    public function course_nameee()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    
    public function category_name()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
