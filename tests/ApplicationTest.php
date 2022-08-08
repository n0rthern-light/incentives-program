<?php

namespace Tests;

use App\Operation\User;
use App\Operation\CalculateUserBalanceService;
use App\Operation\UserActionMadeEvent;
use App\Policy\ActionsPointsWithdrawPolicy;
use App\Policy\TimeLimitedPointsWithdrawPolicy;
use App\Potential\Action;
use App\Potential\Booster;
use App\Potential\Points;
use App\Potential\Reward;
use DateTime;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public function test()
    {
        $deliveryAction = new Action('delivery', new Reward(new Points(1), new ActionsPointsWithdrawPolicy()));
        $rideshareAction = new Action('rideshare', new Reward(new Points(1), new ActionsPointsWithdrawPolicy()));
        $rentAction = new Action('rent', new Reward(new Points(2), new ActionsPointsWithdrawPolicy()));

        $deliveryBooster = new Booster(
            'delivery',
            5,
            2 * 60,
            new Reward(
                new Points(2),
                new TimeLimitedPointsWithdrawPolicy(1),
            )
        );

        $rideshareBooster = new Booster(
            'delivery',
            5,
            8 * 60,
            new Reward(
                new Points(2),
                new TimeLimitedPointsWithdrawPolicy(1),
            )
        );

        $user = new User('John');
        $user->makeDelivery();
        $user->makeRideshare();
        $user->startRent();
        $user->stopRent((new DateTime())->modify('+2 days'));

        $service = new CalculateUserBalanceService();

        $points = $service
            ->setUp(
                [$deliveryAction, $rideshareAction, $rentAction],
                [$deliveryBooster, $rideshareBooster]
            )
            ->calculate(
                \array_filter($user->pullEvents(), function($event) {
                    return $event instanceof UserActionMadeEvent;
                })
            );
    }
}