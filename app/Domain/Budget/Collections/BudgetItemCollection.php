<?php

namespace Budget\Collections;

use Budget\Actions\CalculateRemainingPlannedAction;
use Budget\Actions\ConvertIntegerToDollarsAction;
use Budget\Models\BudgetItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BudgetItemCollection extends Collection
{
    public function withPlannedAmountInDollars(): self
    {
        return $this->map(function (BudgetItem $item) {
            $item['planned_in_dollars'] = (new ConvertIntegerToDollarsAction($item->planned_amount));
            return $item;
        });
    }

    public function withTransactionTotals(): self
    {
        return $this->map(function (BudgetItem $item) {
            $item['transactions_remaining'] = (new CalculateRemainingPlannedAction($item->planned_amount, $item->transactions->sum('amount')));
            return $item;
        });
    }
}
