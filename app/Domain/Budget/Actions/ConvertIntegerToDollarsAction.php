<?php

namespace Budget\Actions;

use Stringable;

class ConvertIntegerToDollarsAction implements Stringable
{
    public function __construct(
        public int $number,
    ) {
    }

    public function __toString(): string
    {
        return '$' . $this->convertToString();
    }

    public function convertToString(): string
    {
        return number_format($this->number / 100, 2);
    }

    public function execute(): float
    {
        return (float) $this->number / 100;
    }
}
