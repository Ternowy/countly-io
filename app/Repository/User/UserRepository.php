<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Models\User;

class UserRepository
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getByEmail(string $email): ?User
    {
        return $this->user->where(['email' => $email])->first();
    }
}