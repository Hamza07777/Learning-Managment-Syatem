<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'tag_id',
    ];
    public function course_namee()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function tag_name()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
