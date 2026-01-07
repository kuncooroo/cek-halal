<?php

namespace App\Policies;

use App\Models\Admin;

class AdminPolicy
{
    public function viewAny(Admin $user): bool
    {
        return true;
    }

    public function create(Admin $user): bool
    {
        return $user->role === 'superadmin';
    }

    public function update(Admin $user, Admin $model): bool
    {
        return $user->role === 'superadmin';
    }

    public function delete(Admin $user, Admin $model): bool
    {
        return $user->role === 'superadmin' && $user->id !== $model->id;
    }
}