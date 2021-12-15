<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\Auth\UserRegistered;
use App\Listeners\SendUserRegisteredEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserRegistered::class => [
            SendUserRegisteredEmail::class,
        ],
    ];

    public function boot()
    {
        //
    }
}
