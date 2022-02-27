<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;
  
    protected $fillable = [
        'user_id',
        'catagory_id',
        'title',
        'metatitle',
        'metatitle',
        'desc',
        'status',
        'published_at',
        'created_at',
        'updated_at',
    ];

    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);

    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
