<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'assignment_total_marks',
        'assignment_days',
        'assignment_note',
        'assignment_detail',
        'assignment_file',
    ];
}
