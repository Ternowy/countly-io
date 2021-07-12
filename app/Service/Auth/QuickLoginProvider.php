<?php

declare(strict_types=1);

namespace App\Service\Auth;

use App\Mail\Auth\QuickLoginRequestMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;

class QuickLoginProvider
{
    private const LINK_AVAILABLE_MINUTES = 15;

    public function requestAccessFor(User $user): void
    {
        $urlToAutoLogin = MagicLink::create(new LoginAction($user), self::LINK_AVAILABLE_MINUTES)->url;

        Mail::to($user)->send(
            new QuickLoginRequestMail($urlToAutoLogin)
        );
    }
}