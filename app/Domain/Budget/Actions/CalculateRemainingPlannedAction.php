<?php

namespace Budget\Actions;

use Stringable;

class CalculateRemainingPlannedAction implements Stringable
{
    public function __construct(
        public int $planned,
        public int $remaining,
    ) {
    }

    public function execute(): int
    {
        return $this->planned - $this->remaining;
    }

    public function __toString(): string
    {
        return (new ConvertIntegerToDollarsAction($this->execute()));
    }
}
