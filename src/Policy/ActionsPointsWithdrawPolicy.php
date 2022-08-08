<?php

namespace App\Policy;

use App\Potential\Points;
use App\Potential\PointsWithdrawPolicy;
use DateTimeInterface;

final class ActionsPointsWithdrawPolicy implements PointsWithdrawPolicy
{
    public function calculatePointsPossibleToWithdraw(
        Points $totalPointsPool,
        DateTimeInterface $claimedAt,
        DateTimeInterface $withdrawRequestAt
    ): Points {
        return $totalPointsPool;
    }
}
