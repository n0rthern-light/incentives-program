<?php

namespace App\Potential;

use Webmozart\Assert\Assert;

class Points
{
    private int $value;

    public function __construct(int $value)
    {
        Assert::greaterThanEq($value, 0, 'Points value must be a non-negative number.');

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function canBeWithdrawn(): bool
    {
        return $this->value > 0;
    }

    public function subtract(Points $other): self
    {
        return new self(\max(0, $this->value - $other->getValue()));
    }
}