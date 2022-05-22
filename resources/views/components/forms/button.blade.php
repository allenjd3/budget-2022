@props(['type' => 'submit'])
<div>
    <button
        type="{{ $type }}"
        class="bg-gray-800 text-gray-50 px-4 py-2"
    >
        {{ $slot }}
    </button>
</div>
