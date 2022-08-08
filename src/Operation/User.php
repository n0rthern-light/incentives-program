<?php

namespace App\Operation;

use App\Shared\Aggregate\AbstractAggregate;
use DateTimeInterface;

class User extends AbstractAggregate
{
    public function makeDelivery(?DateTimeInterface $when = null): void
    {
        $this->publishEvent(new UserMadeDeliveryEvent($this->uuid, $when));
    }

    public function makeRideshare(?DateTimeInterface $when = null): void
    {
        $this->publishEvent(new UserMadeRideshareEvent($this->uuid, $when));
    }

    public function startRent(?DateTimeInterface $when = null): void
    {
        $this->publishEvent(new UserStartedRentEvent($this->uuid, $when));
    }

    public function stopRent(?DateTimeInterface $when = null): void
    {
        $this->publishEvent(new UserStoppedRentEvent($this->uuid, $when));
    }
}
