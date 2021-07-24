<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Marks extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'obtain_marks',
        'percentage',
        'message',
    ];
}
