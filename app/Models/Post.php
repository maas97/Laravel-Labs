<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'posted_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: "posted_by");
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
