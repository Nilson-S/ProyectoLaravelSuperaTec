<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function viewDashboard(User $user)
    {
        return $user->hasRole('Admin');
    }

    public function manageContent(User $user)
    {
        return $user->hasRole('Publicador');
    }

    public function viewContent(User $user)
    {
        return $user->hasRole('Visitante');
    }
    public function delete(User $user)
{
    return $user->hasRole('Admin'); // Solo los admins pueden eliminar
}
}
