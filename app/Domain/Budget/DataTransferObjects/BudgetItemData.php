<?php

namespace Budget\DataTransferObjects;

use App\Admin\Requests\BudgetItemRequest;
use Budget\Actions\ConvertDollarsToIntegerAction;
use Illuminate\Contracts\Support\Arrayable;

class BudgetItemData implements Arrayable
{
    public function __construct(
        public string $name,
        public int $planned_amount
    ) {
    }

    public static function fromRequest(
        BudgetItemRequest $request,
    ): BudgetItemData {
        return new BudgetItemData(
            name: $request->get('name'),
            planned_amount: (new ConvertDollarsToIntegerAction($request->get('planned_amount')))->execute(),
        );
    }
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'planned_amount' => $this->planned_amount,
        ];
    }
}
