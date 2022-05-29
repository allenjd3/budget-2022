<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetMonth;
use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\ArrayShape;

class BudgetMonthShowViewModel implements Arrayable
{
    public BudgetMonth $budget;

    public function __construct(BudgetMonth $budget)
    {
        $this->budget = $budget;
    }

    #[ArrayShape(['budget' => "\Budget\Models\BudgetMonth"])]
    public function toArray(): array
    {
        return [
            'budget' => $this->budget,
        ];
    }
}
