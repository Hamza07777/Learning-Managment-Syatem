<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function course_tag_tag()
    {
        return $this->hasMany(Course_Tag::class,'tag_id');
    }
}
