<?php

namespace App\Shared\Event;

use DateTimeImmutable;
use DateTimeInterface;

abstract class AbstractEvent implements Event
{
    protected DateTimeInterface $occurredOn;

    public function __construct(?DateTimeInterface $occurredOn = null)
    {
        if ($occurredOn === null) {
            $this->occurredOn = new DateTimeImmutable();

            return;
        }

        $this->occurredOn = $occurredOn;
    }

    public function getOccurredOn(): DateTimeInterface
    {
        return $this->occurredOn;
    }
}