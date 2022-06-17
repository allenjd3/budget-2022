<?php

namespace Budget\DataTransferObjects;

use App\Admin\Requests\PaycheckRequest;
use Budget\Actions\ConvertDollarsToIntegerAction;
use Budget\Actions\ConvertIntegerToDollarsAction;
use Budget\Models\BudgetMonth;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;

class PaycheckData implements Arrayable
{

    public function __construct(
        public int $amount,
        public Carbon $payday,
        public BudgetMonth $budget,
    ) {
    }

    public static function fromRequest(
        PaycheckRequest $request,
        BudgetMonth $budget,
    ): PaycheckData {
        return new PaycheckData(
            amount: (new ConvertDollarsToIntegerAction( $request->get('amount') ))->execute(),
            payday: Carbon::parse($request->get('payday')),
            budget: $budget
        );
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'payday' => $this->payday,
            'budget_month_id' => $this->budget->id,
        ];
    }
}
