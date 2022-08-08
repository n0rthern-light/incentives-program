<?php

namespace App\Operation;

use DateTimeInterface;

class UserStartedRentEvent extends UserActionMadeEvent
{
    private const ACTION_NAME = 'rent';

    public function __construct(string $aggregateUuid, ?DateTimeInterface $occurredOn = null)
    {
        parent::__construct($aggregateUuid, self::ACTION_NAME, $occurredOn);
    }
}