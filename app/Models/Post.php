<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory , Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'banner',
        'content',
        'user_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories()
    {
      return  $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shamsiDate()
    {
        return verta($this->created_at)->format("Y/m/d");
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getBannerSrc()
    {
        return asset('images/banners/'. $this->banner);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'likes');
    }
}
