<x-dashboard>
<div class="flex flex-col gap-3">
    <x-card>
        <div class="flex justify-between">
            <h1 class="text-3xl">{{ $budget->month->format('F - Y') }}</h1>

            <a class="py-2 px-4 bg-gray-800 text-gray-50" href="{{ route('budget-category.create', $budget) }}">Add Category</a>
        </div>
    </x-card>

    @foreach ($budget->categories as $category)
        <x-card>
            {{ $category->name }}
        </x-card>
    @endforeach
</div>
</x-dashboard>
