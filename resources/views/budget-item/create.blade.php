<x-dashboard>
    <x-card>
        <h1 class="text-4xl mb-6">Create New Item</h1>

        <form action="{{ route('budget-item.store', $category) }}" method="POST">
            <x-forms.wrapper>
                <x-forms.input
                    name="name"
                    label="Name"
                    :value="old('name')"
                />
                <x-forms.input
                    name="planned_amount"
                    label="Planned"
                    type="number"
                    :value="old('planned')"
                />
                <x-forms.button>New Item</x-forms.button>
            </x-forms.wrapper>
        </form>
    </x-card>
</x-dashboard>
