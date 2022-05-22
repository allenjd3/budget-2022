<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetMonth;
use Illuminate\Contracts\Support\Arrayable;

class BudgetFormViewModel implements Arrayable
{
    public BudgetMonth $budget;

    public function __construct(BudgetMonth $budget = null)
    {
        $this->budget = $budget ?? new BudgetMonth();
    }

    public function toArray()
    {
        return [
            'budget' => $this->budget,
        ];
    }
}
