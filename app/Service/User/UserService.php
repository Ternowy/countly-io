<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Models\User;
use App\Repository\User\UserRepository;

class UserService
{
    protected User $user;

    public function __construct(
        User $user,
        UserRepository $userRepository
    ) {
        $this->user = $user;
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        return $this->user->create($data);
    }

    public function findOrCreateUser(string $email, array $fields): User
    {
        $user = $this->userRepository->getByEmail($email);

        if (empty($user)) {
            $user = $this->create($fields);
        }

        return $user;
    }
}