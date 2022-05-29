<?php

namespace Budget\Collections;

use Budget\Actions\ConvertIntegerToDollarsAction;
use Budget\Models\BudgetItem;
use Illuminate\Database\Eloquent\Collection;

class BudgetItemCollection extends Collection
{
    public function withPlannedAmountInDollars(): self
    {
        return $this->map(function (BudgetItem $budget) {
            $budget['planned_in_dollars'] = (new ConvertIntegerToDollarsAction($budget->planned_amount));
            return $budget;
        });
    }
}
