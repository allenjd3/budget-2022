<?php

namespace Budget\Actions;

class ConvertDollarsToIntegerAction
{
    public function __construct(
        public string $dollars,
    ) {
    }

    public function execute(): int
    {
        return $this->dollars * 100;
    }

}
