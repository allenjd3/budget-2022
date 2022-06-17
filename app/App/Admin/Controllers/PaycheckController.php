<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\PaycheckRequest;
use Budget\DataTransferObjects\PaycheckData;
use Budget\Models\BudgetMonth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PaycheckController
{
    public function create(BudgetMonth $budget): View
    {
        return view('paycheck.create', ['budget' => $budget]);
    }

    public function store(PaycheckRequest $request, BudgetMonth $budget): RedirectResponse
    {
        $validated = PaycheckData::fromRequest($request, $budget);

        $budget->paychecks()->create($validated->toArray());

        return redirect()->route('budget.show', $budget);
    }
}
