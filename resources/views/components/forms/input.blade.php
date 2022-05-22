@props(['name' => '', 'label' => '', 'type' => 'text', 'value' => ''])
<div class="text-gray-700">
    <label
        for="{{ $name }}"
        class="mb-2"
    >{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        type="{{ $type }}"
        class="w-full border-gray-300"
    >
    @error($name)
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
