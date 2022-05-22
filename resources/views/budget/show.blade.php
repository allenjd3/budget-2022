<x-dashboard>
    <h1 class="text-3xl">{{ $budget->month->format('F - Y') }}</h1>

    @foreach ($budget->categories as $category)
        {{ $category->name }}
    @endforeach
</x-dashboard>
