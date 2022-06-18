@props(['amountInDollars', 'label', 'type'])
@php
    $bgClass = match ($type) {
        'planned' => 'bg-indigo-100',
        'subtracted' => 'bg-yellow-100',
        'deficient' => 'bg-red-100',
        'sufficient' => 'bg-green-100',
    };
@endphp
<div
    class="w-full p-4 rounded-lg flex flex-col items-center {{ $bgClass }}">
    <span class="text-3xl">{{ $amountInDollars }}</span>
    <span class="text-md">{{ $label }}</span>
</div>
