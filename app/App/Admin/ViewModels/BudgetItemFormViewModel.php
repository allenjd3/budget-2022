<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetCategory;
use Budget\Models\BudgetItem;
use Illuminate\Contracts\Support\Arrayable;

class BudgetItemFormViewModel implements Arrayable
{
    public BudgetCategory|null $category;
    public BudgetItem $item;

    public function __construct(BudgetCategory|null $category = null, BudgetItem $item = null)
    {
        $this->category = $category;
        $this->item = $item ?? new BudgetItem;
    }

    public function toArray()
    {
        if ($this->category) {
            return [
                'category' => $this->category,
                'item' => $this->item,
            ];
        } else {
            return [
                'item' => $this->item,
            ];
        }
    }
}
