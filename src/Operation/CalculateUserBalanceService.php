<?php

namespace App\Operation;

use App\Potential\Action;
use App\Potential\Booster;
use App\Potential\Points;
use BadMethodCallException;
use DateTimeInterface;

class CalculateUserBalanceService
{
    /** @var Action[] */
    private array $actionMap = [];
    /** @var Booster[] */
    private array $boosterMap = [];
    private bool $setUp = false;

    /**
     * @param Action[] $actions
     * @param Booster[] $boosters
     */
    public function setUp(
        array $actions,
        array $boosters,
    ): static {
        foreach($actions as $action) {
            $key = $action->getUuid();
            if (!isset($this->actionMap[$key])) {
                $this->actionMap[$key] = $action;
            }
        }

        foreach($boosters as $booster) {
            $key = $this->buildBoosterKey($booster->getActionUuid());
            if (!isset($this->boosterMap[$key])) {
                $this->boosterMap[$key] = $booster;
            }
        }

        $this->setUp = true;

        return $this;
    }
    /**
     * @param UserActionMadeEvent[] $userActionEvents
     */
    public function calculate(
        array $userActionEvents,
        ?DateTimeInterface $timeMoment = null
    ): Points {
        if (!$this->setUp) {
            throw new BadMethodCallException('The service must be set up before calling the calculate method!');
        }

        foreach($userActionEvents as $event) {

        }

        return new Points(1);
    }

    private function buildBoosterKey(string $actionKey): string
    {
        return "b_$actionKey";
    }
}