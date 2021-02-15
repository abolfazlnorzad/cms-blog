<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function delete(User $user, Post $post)
    {
        if ($user->role === 'admin') {
            return true;
        }
        return $post->user->id == $user->id;
    }


}