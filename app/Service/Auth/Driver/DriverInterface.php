<?php

declare(strict_types=1);

namespace App\Service\Auth\Driver;

use Laravel\Socialite\Contracts\User;

interface DriverInterface
{
    public function getUser(): User;
}