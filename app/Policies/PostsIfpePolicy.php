<?php

namespace App\Policies;

use App\Models\PostsIfpe;
use App\Models\User;

class PostsIfpePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function createPost(User $user):bool
    {
        return $user->role === 'adm';
    }
}
