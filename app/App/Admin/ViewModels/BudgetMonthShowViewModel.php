<?php

namespace App\Admin\ViewModels;

use Budget\Models\BudgetMonth;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\ArrayShape;

class BudgetMonthShowViewModel implements Arrayable
{

    public function __construct(
        public BudgetMonth $budget,
        public Collection $transactions,
    ) {
    }

    #[ArrayShape(['budget' => "\Budget\Models\BudgetMonth", 'transactions' => "\\Illuminate\\Database\\Eloquent\\Collection"])]
    public function toArray(): array
    {
        return [
            'budget' => $this->budget,
            'transactions' => $this->transactions,
        ];
    }
}
