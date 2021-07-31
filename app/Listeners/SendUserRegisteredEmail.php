<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\Auth\UserRegistered;
use App\Mail\Auth\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;

class SendUserRegisteredEmail
{
    public function __construct()
    {
        //
    }

    public function handle(UserRegistered $event)
    {
        Mail::to($event->user)->send(
            new UserRegisteredMail(
                $event->user
            )
        );
    }
}
