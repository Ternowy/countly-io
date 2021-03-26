<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\User\UserRepository;
use App\Service\Auth\AuthService;
use App\Service\Auth\Driver\DriverFactory;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected AuthService $authService;

    protected DriverFactory $driverFactory;

    protected UserRepository $userRepository;

    protected UserService $userService;

    public function __construct(
        AuthService $authService,
        DriverFactory $driverFactory,
        UserRepository $userRepository,
        UserService $userService
    ) {
        $this->authService = $authService;
        $this->driverFactory = $driverFactory;
        $this->userRepository = $userRepository;
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

        $user = $this->authService->continueWith(
            $this->driverFactory->createInstance($method)
        );

        $userModel = $this->userRepository->getByEmail(
            $user->getEmail()
        );

        if (empty($userModel)) {
            $userModel = $this->userService->create(
                [
                    'name' => $user->getName(),
                    'avatar' => $user->getAvatar(),
                    'email' => $user->getEmail()
                ]
            );
            //EVENT USER REGISTERED
        }

        Auth::login($userModel);

        return redirect()->route('surveys');
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('home');
    }
}
