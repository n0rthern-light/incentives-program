<?php

namespace App\Shared\Aggregate;

use App\Shared\Event\Event;

abstract class AbstractAggregate
{
    protected static array $domainEvents = [];
    protected string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    protected function publishEvent(Event $event): void
    {
        self::$domainEvents[$this->uuid][] = $event;
    }

    public function pullEvents(): array
    {
        $events = self::$domainEvents[$this->uuid];

        unset(self::$domainEvents[$this->uuid]);

        return $events;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}