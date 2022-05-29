<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetMonth;
use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\ArrayShape;

class BudgetFormViewModel implements Arrayable
{
    public BudgetMonth $budget;

    public function __construct(BudgetMonth $budget = null)
    {
        $this->budget = $budget ?? new BudgetMonth();
    }

    #[ArrayShape(['budget' => "\Budget\Models\BudgetMonth"])]
    public function toArray(): array
    {
        return [
            'budget' => $this->budget,
        ];
    }
}
