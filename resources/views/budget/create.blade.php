<x-dashboard>
    <x-card>
        <h1 class="text-4xl mb-6">Create Budget</h1>

        <form method="POST" action="{{ route('budget.store') }}">
            <x-forms.wrapper>
                <x-forms.input
                    type="date"
                    label="Month"
                    name="month"
                    :value="old('month')"
                />
                <x-forms.input
                    type="number"
                    step="0.01"
                    label="Planned Income"
                    name="planned_income"
                    :value="old('planned_income')"
                    />
                <x-forms.button>New Month</x-forms.button>
            </x-forms.wrapper>
        </form>
    </x-card>
</x-dashboard>
