<?php

namespace App\Potential;

class Action
{
    private string $uuid;
    private Reward $reward;

    public function __construct(string $uuid, Reward $reward)
    {
        $this->uuid = $uuid;
        $this->reward = $reward;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getReward(): Reward
    {
        return $this->reward;
    }
}