<?php

declare(strict_types=1);

namespace App\Service\Auth\Driver;

use Laravel\Socialite\Contracts\User;

class TwitterDriver implements DriverInterface
{
    public function getUser(): User
    {
        // TODO: Implement getUser() method.
    }
}