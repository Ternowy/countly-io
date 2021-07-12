<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\QuickLoginRequest;
use App\Service\Auth\QuickLoginProvider;
use App\Service\Auth\SocialMediaAuthService;
use App\Service\User\UserService;

class QuickLoginController extends Controller
{
    protected SocialMediaAuthService $authService;

    protected QuickLoginProvider $quickLoginProvider;

    protected UserService $userService;

    public function __construct(
        SocialMediaAuthService $authService,
        UserService $userService,
        QuickLoginProvider $quickLoginProvider
    ) {
        $this->authService = $authService;
        $this->userService = $userService;
        $this->quickLoginProvider = $quickLoginProvider;
    }

    public function requestLoginLink(QuickLoginRequest $request)
    {
        $user = $this->userService->findOrCreateUser(
            $request->email,
            [
                'name' => 'Customer',
                'avatar' => '/images/smiley.png',
                'email' => $request->email
            ]
        );

        $this->quickLoginProvider->requestAccessFor($user);

        return response()->json(['status' => 'link is sent']);
    }
}