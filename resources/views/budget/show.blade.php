@php
  /** @var \Budget\Models\BudgetMonth $budget */
@endphp

<x-dashboard>
    <x-slot:sidebar>
        <div class="flex flex-col gap-3">
            <x-card>
                <h2 class="text-2xl">Transactions</h2>
                <form
                    method="POST"
                    action="{{ route('budget-transactions.store', $budget) }}"
                >
                    <x-forms.wrapper>
                        <x-forms.input
                            name="name"
                            label="Name:"
                            value="{{ old('transactions[name]') }}"
                        />
                        <x-forms.input
                            name="amount"
                            label="Amount:"
                            type="number"
                            step="0.01"
                            value="{{ old('transactions[amount]') }}"
                        />
                        <x-forms.input
                            name="date_purchased"
                            label="Date:"
                            type="date"
                            value="{{ old('transactions[date_purchased]') }}"
                        />

                        <div>
                            <div><label for="item">Associate Item</label></div>
                            <div>
                                <select id="item">
                                    @foreach ($budget->categories->map->items->flatten()->prepend((object) ['name' => '', 'id' => null]) as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <x-forms.button>Add Transaction</x-forms.button>
                    </x-forms.wrapper>
                </form>
            </x-card>
            <x-card>
                <p class="text-lg mb-6">Recent Transactions</p>
                @foreach ($transactions as $transaction)
                    <div class="flex justify-between">
                        <div>{{ $transaction->name }}</div>
                        <div>{{ $transaction->amount_in_dollars }}</div>
                    </div>
                @endforeach
            </x-card>
        </div>
    </x-slot:sidebar>
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
            <div class="flex justify-between gap-2 mt-4">
                <x-info
                    :amount-in-dollars="$budget->total_planned"
                    label="Total Planned"
                    type="planned"
                />
                <x-info
                    :amount-in-dollars="$budget->getFormattedPlannedIncome()"
                    label="Total Planned Income"
                    type="subtracted"
                />
                <x-info
                    :amount-in-dollars="$plannedAmountRemainder"
                    label="Remaining"
                    type="sufficient"
                />
            </div>
        </x-card>
        <x-card>
            <h1 class="text-2xl">Actual Budget</h1>
            <div class="flex justify-between gap-2 mt-4">
                <x-info
                    :amount-in-dollars="$budget->getFormattedTransactionSumAmount()"
                    label="Total Spent"
                    type="planned"
                />
                <x-info
                    :amount-in-dollars="$budget->getFormattedActualIncome()"
                    label="Paycheck Total"
                    type="subtracted"
                />
                <x-info
                    :amount-in-dollars="$actualAmountRemainder"
                    label="Remaining"
                    type="deficient"
                />
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
                    @foreach ($category->items->withPlannedAmountInDollars()->withTransactionTotals() as $item)
                        <div class="w-full flex items-center justify-between p-4 bg-indigo-100 rounded-md">
                            <div class="text-lg flex-1">{{ $item->name }}</div>
                            <div class="flex gap-4">
                                <div class="text-red-500 font-bold">{{ $item->transactions_remaining }}</div>
                                <div class="text-indigo-500 font-bold">{{ $item->planned_in_dollars }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        @endforeach
    </div>
</x-dashboard>
