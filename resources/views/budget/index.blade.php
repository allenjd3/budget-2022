<x-dashboard>
    <h1 class="text-4xl mb-6">Budget</h1>
    <ul class="list-disc ml-4">
        @foreach ($budgets as $budget)
            <li><a href="{{ route('budget.show', $budget) }}">{{ $budget->month->format('F - Y') }}</a></li>
        @endforeach
    </ul>
</x-dashboard>
