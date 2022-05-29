<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetCategory;
use Budget\Models\BudgetItem;
use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\ArrayShape;

class BudgetItemFormViewModel implements Arrayable
{
    public BudgetCategory|null $category;
    public BudgetItem $item;

    public function __construct(BudgetCategory|null $category = null, BudgetItem $item = null)
    {
        $this->category = $category;
        $this->item = $item ?? new BudgetItem;
    }

    #[ArrayShape([
        'category' => "\Budget\Models\BudgetCategory|null",
        'item' => "\Budget\Models\BudgetItem",
        ])]
    public function toArray(): array
    {
        return [
            'category' => $this->category,
            'item' => $this->item,
        ];
    }
}
