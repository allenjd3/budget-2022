<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\BudgetItemRequest;
use App\Admin\ViewModels\BudgetItemFormViewModel;
use Budget\DataTransferObjects\BudgetItemData;
use Budget\Models\BudgetCategory;
use Budget\Models\BudgetItem;

class BudgetItemController extends Controller
{
    public function create(BudgetCategory $category)
    {
        return view('budget-item.create', (new BudgetItemFormViewModel($category)));
    }

    public function store(BudgetItemRequest $request, BudgetCategory $category)
    {
        $validated = BudgetItemData::fromRequest($request);

        $category->items()->create($validated->toArray());

        return redirect()->route('budget.show', $category->month);
    }

    public function edit(BudgetItem $item)
    {
        return view('budget-item.edit', (new BudgetItemFormViewModel(item: $item)));
    }

    public function update(BudgetItemRequest $request, BudgetItem $item)
    {
        $validated = BudgetItemData::fromRequest($request);

        $item->update($validated->toArray());

        return redirect()->route('budget.show', $item->category->month);
    }

}
