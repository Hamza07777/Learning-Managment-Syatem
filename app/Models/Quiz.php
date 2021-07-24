<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'total_marks',
        'quiz_allow_days',
        'quiz_retakes',
        'quiz_note',
        'file',
    ];
}
