<?php

namespace App\Operation;

use DateTimeInterface;

class UserMadeDeliveryEvent extends UserActionMadeEvent
{
    private const ACTION_NAME = 'delivery';

    public function __construct(string $aggregateUuid, ?DateTimeInterface $occurredOn = null)
    {
        parent::__construct($aggregateUuid, self::ACTION_NAME, $occurredOn);
    }
}