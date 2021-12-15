<?php

declare(strict_types=1);

namespace App\Service\Auth\Driver;

use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class FacebookDriver implements DriverInterface
{
    public function getUser(): User
    {
        return Socialite::driver('facebook')->stateless()->user();
    }
}