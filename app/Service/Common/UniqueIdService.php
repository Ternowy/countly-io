<?php

declare(strict_types=1);

namespace App\Service\Common;

use Vinkla\Hashids\HashidsManager;

class UniqueIdService
{
    protected HashidsManager $hashidsManager;

    public function __construct(HashidsManager $hashidsManager)
    {
        $this->hashidsManager = $hashidsManager;
    }

    public function encode(mixed ...$params): string
    {
        return $this->hashidsManager->encode($params);
    }

    public function random(): string
    {
        return $this->hashidsManager->encode(
            rand(1, 10),
            rand(1, 10),
            rand(1, 10),
            rand(1, 10)
        );
    }
}