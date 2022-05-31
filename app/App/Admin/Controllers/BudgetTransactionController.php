<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\BudgetTransactionRequest;
use Budget\DataTransferObjects\BudgetTransactionData;
use Budget\Models\BudgetMonth;
use Illuminate\Http\RedirectResponse;

class BudgetTransactionController
{
    public function store(BudgetTransactionRequest $request, BudgetMonth $budget): RedirectResponse
    {
        $validated = BudgetTransactionData::fromRequest($request);

        $budget->transactions()->create($validated->toArray());

        return redirect()->route('budget.show', $budget);
    }
}
