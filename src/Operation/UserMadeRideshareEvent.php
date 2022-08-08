<?php

namespace App\Operation;

use DateTimeInterface;

class UserMadeRideshareEvent extends UserActionMadeEvent
{
    private const ACTION_NAME = 'rideshare';

    public function __construct(string $aggregateUuid, ?DateTimeInterface $occurredOn = null)
    {
        parent::__construct($aggregateUuid, self::ACTION_NAME, $occurredOn);
    }
}