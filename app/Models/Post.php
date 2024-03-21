<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'body',
        'published',
        'post',
        'mp3url',
        'mp3duration',
    ];

    public function author()
    {
        return $this->belongsTo(User::class); // Assuming your User model
    }

    // Additional methods as needed
}
