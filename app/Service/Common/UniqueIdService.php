<?php

declare(strict_types=1);

namespace App\Service\Common;

use Hashids\Hashids;

class UniqueIdService
{
    protected Hashids $hashids;

    public function __construct(Hashids $hashids)
    {
        $this->hashids = $hashids;
    }

    public function encode(mixed ...$params): string
    {
        return $this->hashids->encode($params);
    }

    public function random(): string
    {
        return $this->hashids->encode(
            rand(1, 10),
            rand(1, 100),
            rand(),
        );
    }
}