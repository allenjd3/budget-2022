<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\BudgetCategoryRequest;
use App\Admin\ViewModels\BudgetCategoryFormViewModel;
use Budget\DataTransferObjects\BudgetCategoryData;
use Budget\Models\BudgetCategory;
use Budget\Models\BudgetMonth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BudgetCategoryController extends Controller
{
    public function create(BudgetMonth $budget): View
    {
        return view('budget-category.create', (new BudgetCategoryFormViewModel($budget)));
    }

    public function store(BudgetCategoryRequest $request, BudgetMonth $budget): RedirectResponse
    {
        $validated = BudgetCategoryData::fromRequest($request);

        $budget->categories()->create($validated->toArray());

        return redirect()->route('budget.show', $budget);
    }

    public function edit(BudgetCategory $category): View
    {
        return view('budget-category.edit', (new BudgetCategoryFormViewModel($category)));
    }

    public function update(BudgetCategoryRequest $request, BudgetCategory $category): RedirectResponse
    {
        $this->authorize('update', $category->month);

        $validated = BudgetCategoryData::fromRequest($request);

        $category->update($validated->toArray());

        return redirect()->route('budget.show', $category->month);
    }

    public function delete(BudgetCategory $category)
    {
        $this->authorize('update', $category->month);

        $category->delete();

        return redirect()->route('budget.show', $category->month);
    }
}
