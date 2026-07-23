<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    public function create(User $user): bool
    {
        return $user->email === 'tsmith@mail.com';
    }

    public function edit(User $user, User $model): bool
    {
        return (bool) mt_rand(0,1);
    }
}
