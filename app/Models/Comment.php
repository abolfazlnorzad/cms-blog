<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'approved',
        'user_id',
        'post_id',
        'comment_id',
    ];
    protected $with = ['approvedReplies'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class);
    }
    public function approvedReplies()
    {
        return $this->replies()->where('approved',true);
    }

    public function shamsiDate()
    {
        return verta($this->created_at)->format("Y/m/d");
    }
}
