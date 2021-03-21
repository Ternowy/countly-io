<?php

declare(strict_types=1);

namespace App\Service\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthService
{
    public function validateMethod(string $method): void
    {
        Validator::make(
            ['method' => $method],
            [
                'method' => [
                    'required',
                    Rule::in(['facebook', 'google', 'twitter']),
                ]
            ]
        )->validate();
    }
}