<?php

namespace App\Messenger;

use Symfony\Component\Messenger\Stamp\StampInterface;

class UniqueIdStamp implements StampInterface
{
    public function __construct(
        private readonly string $uniqueId
    ) {
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }
}
