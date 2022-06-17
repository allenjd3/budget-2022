<?php

namespace App\Admin\ViewModels;

use Budget\Actions\CalculateRemainingAction;
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

    #[ArrayShape([
        'budget' => "\Budget\Models\BudgetMonth",
        'transactions' => "\Illuminate\Database\Eloquent\Collection",
        'actualAmountRemainder' => "\Budget\Actions\ConvertIntegerToDollarsAction|string",
    ])]
    public function toArray(): array
    {
        return [
            'budget' => $this->budget,
            'transactions' => $this->transactions,
            'plannedAmountRemainder' => (new CalculateRemainingAction($this->budget->planned_income, $this->budget->categories()->withSum('items', 'planned_amount')->get()->sum('items_sum_planned_amount'))),
            'actualAmountRemainder' => (new CalculateRemainingAction($this->budget->paychecks()->sum('amount'), $this->budget->transactions_sum_amount)),
        ];
    }
}
