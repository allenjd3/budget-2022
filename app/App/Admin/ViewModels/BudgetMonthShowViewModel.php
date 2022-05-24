<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetMonth;
use Illuminate\Contracts\Support\Arrayable;

class BudgetMonthShowViewModel implements Arrayable
{
    public BudgetMonth $budget;

    public function __construct(BudgetMonth $budget)
    {
        $this->budget = $budget;
    }

    public function toArray()
    {
        return [
            'budget' => $this->budget,
        ];
    }
}
