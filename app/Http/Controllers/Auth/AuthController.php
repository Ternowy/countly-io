<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\Auth\SocialMediaAuthService;

class AuthController extends Controller
{
    protected SocialMediaAuthService $authService;

    public function __construct(SocialMediaAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('home');
    }
}
