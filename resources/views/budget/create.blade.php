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

                <x-forms.button>New Month</x-forms.button>
            </x-forms.wrapper>
        </form>
    </x-card>
</x-dashboard>
