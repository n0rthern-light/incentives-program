<?php

namespace App\Policy;

use App\Potential\Points;
use App\Potential\PointsWithdrawPolicy;
use DateTimeInterface;

final class TimeLimitedPointsWithdrawPolicy implements PointsWithdrawPolicy
{
    private int $expireAfterMonths;

    public function __construct(int $expireAfterMonths)
    {
        $this->expireAfterMonths = $expireAfterMonths;
    }

    public function calculatePointsPossibleToWithdraw(
        Points $totalPointsPool,
        DateTimeInterface $claimedAt,
        DateTimeInterface $withdrawRequestAt
    ): Points {
        $claimedAtModifiable = \DateTime::createFromInterface($claimedAt);
        $claimedAtModifiable->modify("+$this->expireAfterMonths months");

        if ($claimedAtModifiable > $withdrawRequestAt) {
            return new Points(0);
        }

        return $totalPointsPool;
    }
}