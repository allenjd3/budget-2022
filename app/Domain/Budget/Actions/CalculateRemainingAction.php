<?php

namespace Budget\Actions;

use Stringable;

class CalculateRemainingAction implements Stringable
{
    public function __construct(
        public int $minuend,
        public int $subtrahend,
    ) {
    }

    public function execute(): int
    {
        return $this->minuend - $this->subtrahend;
    }

    public function __toString(): string
    {
        return (new ConvertIntegerToDollarsAction($this->execute()));
    }
}
