<x-dashboard>
    <x-card>
        <h1 class="text-4xl mb-6">Create New Paycheck</h1>
        <form method="POST" action="{{ route('paycheck.store', $budget) }}">
            <x-forms.wrapper>
                <x-forms.input
                    name="amount"
                    label="Amount"
                    type="number"
                    step="0.01"
                    :value="old('amount')"
                />
                <x-forms.input
                    name="payday"
                    label="Date Paid"
                    type="date"
                    :value="old('payday')"
                />
                <x-forms.button>Add Paycheck</x-forms.button>
            </x-forms.wrapper>
        </form>
    </x-card>
</x-dashboard>
