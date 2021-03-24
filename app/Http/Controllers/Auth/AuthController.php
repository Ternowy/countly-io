<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\Auth\AuthService;
use App\Service\Auth\Driver\DriverFactory;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected AuthService $authService;

    protected DriverFactory $driverFactory;

    public function __construct(AuthService $authService, DriverFactory $driverFactory)
    {
        $this->authService = $authService;
        $this->driverFactory = $driverFactory;
    }

    public function authenticate($method)
    {
        $this->authService->validateMethod($method);
        return Socialite::driver($method)->redirect();
    }

    public function callback($method)
    {
        $this->authService->validateMethod($method);

        $user = $this->authService->continueWith(
            $this->driverFactory->createInstance($method)
        );

        return redirect()->route('surveys');
    }

    public function logout()
    {
    }
}
