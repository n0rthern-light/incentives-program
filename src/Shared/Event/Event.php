<?php

namespace App\Shared\Event;

use DateTimeInterface;

interface Event
{
    public function getOccurredOn(): DateTimeInterface;
}
