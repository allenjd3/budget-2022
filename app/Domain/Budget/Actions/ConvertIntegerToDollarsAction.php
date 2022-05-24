<?php

namespace Budget\Actions;

class ConvertIntegerToDollarsAction
{
    public function __construct(
        public int $number,
    ) {
    }

    public function execute(): string
    {
        return '$' . number_format($this->number / 100, 2);
    }
}
