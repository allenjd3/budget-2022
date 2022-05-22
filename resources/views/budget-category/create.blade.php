<x-dashboard>
    <x-card>
        <h1 class="text-4xl mb-6">Create New Category</h1>

        <form action="{{ route('budget-category.store', $budget) }}" method="POST">
            <x-forms.wrapper>
                <x-forms.input
                    name="name"
                    label="Name"
                    :value="old('name')"
                />
                <x-forms.button>New Category</x-forms.button>
            </x-forms.wrapper>
        </form>
    </x-card>
</x-dashboard>
