<?php

namespace Budget\DataTransferObjects;

use App\Admin\Requests\BudgetTransactionRequest;
use Budget\Actions\ConvertDollarsToIntegerAction;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\ArrayShape;

class BudgetTransactionData implements Arrayable
{
    public function __construct(
        public string $name,
        public int $amount,
        public Carbon|null $date_purchased,
        public int|null $budget_item_id,
    ) {
    }

    public static function fromRequest(
        BudgetTransactionRequest $request,
    ): BudgetTransactionData {
        return new BudgetTransactionData(
            name: $request->get('name'),
            amount: (new ConvertDollarsToIntegerAction($request->get('amount')))->execute(),
            date_purchased: Carbon::parse($request->get('date_purchased')),
            budget_item_id: $request->get('budget_item_id'),
        );

    }

    #[ArrayShape(['name' => "string", 'amount' => "int", 'budget_item_id' => "int", 'budget_month_id' => "int", 'date_purchased' => "Carbon\\Carbon"])]
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->amount,
            'date_purchased' => $this->date_purchased,
            'budget_item_id' => $this->budget_item_id,
        ];
    }
}
