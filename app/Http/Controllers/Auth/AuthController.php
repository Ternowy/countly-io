<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Service\Auth\AuthService;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate($method)
    {
        $this->authService->validateMethod($method);
        return Socialite::driver($method)->redirect();
    }

    public function callback($method)
    {
        $this->authService->validateMethod($method);

        $user = Socialite::driver($method)->user();

        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;

        $user->getName();
        $user->getEmail();
        $user->getAvatar();
    }

    public function logout()
    {
    }
}
