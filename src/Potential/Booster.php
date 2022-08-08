<?php

namespace App\Potential;

class Booster
{
    private string $actionUuid;
    private int $minOccurrencesPerTimeframe;
    private int $timeframeInMinutes;
    private Reward $bonusReward;

    public function __construct(
        string $actionUuid,
        int $minOccurrencesPerTimeframe,
        int $timeframeInMinutes,
        Reward $bonusReward
    ) {
        $this->actionUuid = $actionUuid;
        $this->minOccurrencesPerTimeframe = $minOccurrencesPerTimeframe;
        $this->timeframeInMinutes = $timeframeInMinutes;
        $this->bonusReward = $bonusReward;
    }

    public function getActionUuid(): string
    {
        return $this->actionUuid;
    }

    public function getMinOccurrencesPerTimeframe(): int
    {
        return $this->minOccurrencesPerTimeframe;
    }

    public function getTimeframeInMinutes(): int
    {
        return $this->timeframeInMinutes;
    }

    public function getBonusReward(): Reward
    {
        return $this->bonusReward;
    }
}