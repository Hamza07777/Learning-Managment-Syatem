<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'file',
        'status',
    ];

    public function category_name()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
