<?php

namespace Budget\DataTransferObjects;

use App\Admin\Requests\BudgetCategoryRequest;
use Illuminate\Contracts\Support\Arrayable;

class BudgetCategoryData implements Arrayable
{
    public function __construct(public string $name) {}

    public static function fromRequest(
        BudgetCategoryRequest $request
    ): BudgetCategoryData {
        return new BudgetCategoryData(
            name: $request->get('name'),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
