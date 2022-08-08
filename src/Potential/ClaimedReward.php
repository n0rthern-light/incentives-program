<?php

namespace App\Potential;

use DateTime;
use DateTimeInterface;

class ClaimedReward
{
    private Points $points;
    private PointsWithdrawPolicy $policy;
    private DateTimeInterface $claimedAt;

    public function __construct(Points $points, PointsWithdrawPolicy $policy, DateTimeInterface $claimedAt)
    {
        $this->points = $points;
        $this->policy = $policy;
        $this->claimedAt = $claimedAt;
    }

    public function withdrawPoints(?DateTimeInterface $withdrawAt = null): Points
    {
        if (!$this->points->canBeWithdrawn()) {
            return new Points(0);
        }

        $pointsToWithdraw = $this->policy->calculatePointsPossibleToWithdraw(
            $this->points,
            $this->claimedAt,
            $withdrawAt ?: new DateTime()
        );

        $this->points = $this->points->subtract($pointsToWithdraw);

        return $pointsToWithdraw;
    }
}