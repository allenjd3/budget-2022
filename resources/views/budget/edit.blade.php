<x-dashboard>
    <x-card>
        <h1 class="text-4xl mb-6">Edit Budget</h1>

        <form
            method="POST"
            action="{{ route('budget.update', $budget) }}"
        >
            <x-forms.wrapper>
                @method('PATCH')
                <x-forms.input
                    type="date"
                    label="Month"
                    name="month"
                    :value="old('month', $budget->month->format('Y-m-d'))"
                />

                <x-forms.button>Edit Month</x-forms.button>
            </x-forms.wrapper>
        </form>
    </x-card>
</x-dashboard>
