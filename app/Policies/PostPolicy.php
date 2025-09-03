<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $Post): bool
    {
        return($user->role === 'admin'|| $user->id === $Post->user_id);
    }

    /**
     * determina quem pode criar os posts
     */
    public function create(User $user): bool
    {
        if($user->role !== 'visitor'){
            return true;
        }

        return false;

    }

    /**
     * determina quam pode atualizar os posts.
     */
    public function update(User $user, Post $Post): bool
    {
        return $user->id === $Post->user_id;
    }

    /**
     * determina quam pode deletar os posts.
     */
    public function delete(User $user, Post $Post): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $Post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $Post): bool
    {
        return true;
    }
}
