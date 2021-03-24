<?php

declare(strict_types=1);

namespace App\Service\Auth;

use App\Models\User;
use App\Repository\User\UserRepository;
use App\Service\Auth\Driver\DriverInterface;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthService
{
    protected UserRepository $userRepository;

    protected UserService $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

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
            ]
        )->validate();
    }

    public function continueWith(DriverInterface $driver): User
    {
        $user = $driver->getUser();

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
        }

        //TODO authorize and login (with timeout)

        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;

        return $userModel;
    }

}