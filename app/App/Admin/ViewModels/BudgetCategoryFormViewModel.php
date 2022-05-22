<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetCategory;
use Budget\Models\BudgetMonth;
use Illuminate\Contracts\Support\Arrayable;

class BudgetCategoryFormViewModel implements Arrayable
{
    public BudgetCategory $category;
    public BudgetMonth $budget;

    public function __construct(BudgetMonth $budget, BudgetCategory $category = null) {
        $this->budget = $budget;
        $this->category = $category ?? new BudgetCategory();
    }

    public function toArray(): array
    {
        return [
            'budget' => $this->budget,
            'category' => $this->category,
        ];
    }
}
