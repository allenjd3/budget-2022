<?php

namespace Budget\DataTransferObjects;

use App\Admin\Requests\BudgetTransactionRequest;
use Budget\Actions\ConvertDollarsToIntegerAction;
use Illuminate\Contracts\Support\Arrayable;
use JetBrains\PhpStorm\ArrayShape;

class BudgetTransactionData implements Arrayable
{
    public function __construct(
        public string $name,
        public int $amount,
        public int $budget_item_id,
    ) {
    }

    public static function fromRequest(
        BudgetTransactionRequest $request,
    ): BudgetTransactionData {
        return new BudgetTransactionData(
            name: $request->get('name'),
            amount: (new ConvertDollarsToIntegerAction($request->get('amount')))->execute(),
            budget_item_id: $request->get('budget_category_id'),
        );

    }

    #[ArrayShape(['name' => "string", 'amount' => "int", 'budget_category_id' => "int", 'budget_month_id' => "int"])]
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->amount,
            'budget_category_id' => $this->budget_category_id,
        ];
    }
}
