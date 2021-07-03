<?php

declare(strict_types=1);

namespace App\Service\Auth\Driver;

class DriverFactory
{
    protected $drivers = [
        'google' => GoogleDriver::class,
        'facebook' => FacebookDriver::class,
        'twitter' => TwitterDriver::class
    ];

    public function createInstance(string $type): DriverInterface
    {
        if (!in_array($type, array_keys($this->drivers))) {
            throw new \InvalidArgumentException("Driver $type is not set");
        }

        return new $this->drivers[$type]();
    }
}