<?php

namespace App\Potential;

use DateTimeInterface;

class Reward
{
    private Points $points;
    private PointsWithdrawPolicy $policy;

    public function __construct(Points $points, PointsWithdrawPolicy $policy)
    {
        $this->points = $points;
        $this->policy = $policy;
    }

    public function claimReward(DateTimeInterface $claimAt): ClaimedReward
    {
        return new ClaimedReward(
            $this->points,
            $this->policy,
            $claimAt
        );
    }
}