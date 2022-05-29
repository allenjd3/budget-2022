@php
  /** @var \Budget\Models\BudgetMonth $budget */
@endphp

<x-dashboard>
<div class="flex flex-col gap-3">
    <x-card>
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl">{{ $budget->month->format('F - Y') }}</h1>
                <a href="{{ route('budget.edit', $budget) }}">Edit</a>
            </div>
            <div>
                <a class="py-2 px-4 bg-gray-800 text-gray-50" href="{{ route('budget-category.create', $budget) }}">Add Category</a>
            </div>
        </div>
    </x-card>
    <x-card>
        <h1 class="text-2xl">Planned Budget</h1>
        <div>
            <div>Total Planned: {{ $budget->total_planned }}</div>
            <div>Total Planned Income: {{ $budget->getFormattedPlannedIncome() }}</div>
        </div>
    </x-card>

    @foreach ($budget->categories as $category)
        <x-card>
            <div class="mb-6 flex justify-between items-center">
                <div class="text-2xl">{{ $category->name }}</div>
                <a
                    class="py-2 px-4 bg-gray-800 text-gray-50"
                    href="{{ route('budget-item.create', $category) }}"
                >Add Item</a>
            </div>
            <div class="flex flex-col gap-2">
                @foreach ($category->items->withPlannedAmountInDollars() as $item)
                    <div class="w-full flex items-center justify-between p-4 bg-indigo-100 rounded-md">
                        <div class="text-lg">{{ $item->name }}</div>
                        <div class="flex gap-4 w-1/5">
                            <div class="text-red-500 font-bold">$25.00</div>
                            <div class="text-indigo-500 font-bold">{{ $item->planned_in_dollars }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
    @endforeach
</div>
</x-dashboard>
