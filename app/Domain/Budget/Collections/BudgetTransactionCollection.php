<?php

namespace Budget\Collections;

use Budget\Actions\ConvertIntegerToDollarsAction;
use Budget\Models\BudgetTransaction;
use Illuminate\Database\Eloquent\Collection;

class BudgetTransactionCollection extends Collection
{
    public function withAmountInDollars(): self
    {
        return $this->map(function (BudgetTransaction $transaction) {
            $transaction['amount_in_dollars'] = (new ConvertIntegerToDollarsAction($transaction->amount));
            return $transaction;
        });
    }

}
