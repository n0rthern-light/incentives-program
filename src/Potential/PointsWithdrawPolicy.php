<?php

namespace App\Potential;

use DateTimeInterface;

interface PointsWithdrawPolicy
{
    public function calculatePointsPossibleToWithdraw(
        Points $totalPointsPool,
        DateTimeInterface $claimedAt,
        DateTimeInterface $withdrawRequestAt
    ): Points;
}