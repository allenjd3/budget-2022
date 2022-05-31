<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\BudgetMonthRequest;
use App\Admin\ViewModels\BudgetFormViewModel;
use App\Admin\ViewModels\BudgetMonthShowViewModel;
use Budget\DataTransferObjects\BudgetMonthData;
use Budget\Models\BudgetMonth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BudgetController extends Controller
{
    public function index(): View
    {
        return view('budget.index', [
            'budgets' => auth()
                ->user()
                ->budgetMonths()
                ->orderBy('created_at', 'desc')
                ->get(),
        ]);
    }

    public function show(BudgetMonth $budget): View
    {
        $this->authorize('view', $budget);
        $transactions = $budget
            ->transactions()
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->withAmountInDollars();

        return view('budget.show', (new BudgetMonthShowViewModel($budget->load('categories.items'), $transactions)));
    }

    public function create(): View
    {
        return view('budget.create', (new BudgetFormViewModel));
    }

    public function store(BudgetMonthRequest $request, BudgetMonth $budget): RedirectResponse
    {
        $validated = BudgetMonthData::fromRequest($request, auth()->user());

        $budget->create($validated->toArray());
        return redirect()->route('budget.index');
    }

    public function edit(BudgetMonth $budget): View
    {
        return view('budget.edit', (new BudgetFormViewModel($budget)));
    }

    public function update(BudgetMonthRequest $request, BudgetMonth $budget): RedirectResponse
    {
        $this->authorize('update', $budget);

        $validated = BudgetMonthData::fromRequest($request, auth()->user());

        $budget->update($validated->toArray());
        return redirect()->route('budget.index');
    }

    public function delete(BudgetMonth $budget): RedirectResponse
    {
        $this->authorize('update', $budget);

        $budget->delete();

        return redirect()->route('budget.index');
    }
}
