<?php

namespace App\Shared\Aggregate;

use App\Shared\Event\AbstractEvent;
use DateTimeInterface;

abstract class AbstractAggregateEvent extends AbstractEvent implements AggregateEvent
{
    protected string $aggregateUuid;

    public function __construct(string $aggregateUuid, ?DateTimeInterface $occurredOn = null)
    {
        $this->aggregateUuid = $aggregateUuid;
        parent::__construct($occurredOn);
    }

    public function getAggregateUuid(): string
    {
        return $this->aggregateUuid;
    }
}