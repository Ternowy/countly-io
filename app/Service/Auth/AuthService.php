<?php

declare(strict_types=1);

namespace App\Service\Auth;

use App\Service\Auth\Driver\DriverInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Contracts\User;

class AuthService
{
    public function validateMethod(string $method): void
    {
        //TODO add custom message for hackers
        Validator::make(
            ['method' => $method],
            [
                'method' => [
                    'required',
                    Rule::in(['facebook', 'google', 'twitter']),
                ]
            ],
            ['method' => __('auth.continueWith.methodNotAllowed')]
        )->validate();
    }

    public function continueWith(DriverInterface $driver): User
    {
        return $driver->getUser();
    }

    public function logout(): void
    {
        Auth::logout();
    }
}