<?php

namespace App\Policies;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        // Define las condiciones para permitir la creación
        return $user->hasRole('Admin') || $user->hasRole('Publicador');
    }

    public function update(User $user, BlogPost $blogPost)
    {
        // Define las condiciones para permitir la actualización
        return $user->hasRole('Admin') || $user->hasRole('Publicador');
    }

    public function delete(User $user, BlogPost $blogPost)
    {
        // Define las condiciones para permitir la eliminación
        return $user->hasRole('Admin');
    }
}
