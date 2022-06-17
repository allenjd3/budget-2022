<?php

namespace Budget\Collections;

use Budget\Actions\CalculateRemainingAction;
use Budget\Actions\ConvertIntegerToDollarsAction;
use Budget\Models\BudgetItem;
use Illuminate\Database\Eloquent\Collection;

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
            if (! $item->transactions_sum_amount) {
                $item['transactions_remaining'] = (new CalculateRemainingAction($item->planned_amount, $item->transactions()->sum('amount')));
            } else {
                $item['transactions_remaining'] = (new CalculateRemainingAction($item->planned_amount, $item->transactions_sum_amount));
            }
            return $item;
        });
    }
}
