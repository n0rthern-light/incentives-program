<?php

namespace App\Operation;

use App\Shared\Aggregate\AbstractAggregateEvent;
use DateTimeInterface;

abstract class UserActionMadeEvent extends AbstractAggregateEvent
{
    private string $actionName;

    public function __construct(string $aggregateUuid, string $actionName, ?DateTimeInterface $occurredOn = null)
    {
        $this->actionName = $actionName;
        parent::__construct($aggregateUuid, $occurredOn);
    }

    public function getActionName(): string
    {
        return $this->actionName;
    }
}