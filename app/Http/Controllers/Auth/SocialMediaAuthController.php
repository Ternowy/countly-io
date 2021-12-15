<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Repository\User\UserRepository;
use App\Service\Auth\SocialMediaAuthService;
use App\Service\Auth\Driver\DriverFactory;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialMediaAuthController extends Controller
{
    protected SocialMediaAuthService $authService;

    protected DriverFactory $driverFactory;

    protected UserRepository $userRepository;

    protected UserService $userService;

    public function __construct(
        SocialMediaAuthService $authService,
        DriverFactory $driverFactory,
        UserService $userService
    ) {
        $this->authService = $authService;
        $this->driverFactory = $driverFactory;
        $this->userService = $userService;
    }

    public function authenticate($method)
    {
        $this->authService->validateMethod($method);

        return Socialite::driver($method)->redirect();
    }

    public function callback($method)
    {
        $this->authService->validateMethod($method);

        $userData = $this->authService->continueWith(
            $this->driverFactory->createInstance($method)
        );

        $user = $this->userService->firstOrCreateByEmail(
            $userData->getEmail(),
            [
                'name' => $userData->getName(),
                'avatar' => $userData->getAvatar(),
                'email' => $userData->getEmail()
            ]
        );

        if ($user->wasRecentlyCreated) {
            event(new UserRegistered($user));
        }

        Auth::login($user, true);

        return Redirect::route('surveys');
    }
}
