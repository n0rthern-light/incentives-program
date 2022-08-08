<?php

namespace App\Shared\Aggregate;

use App\Shared\Event\Event;

interface AggregateEvent extends Event
{
    public function getAggregateUuid(): string;
}