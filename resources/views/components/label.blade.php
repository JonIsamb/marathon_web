{{-- props label --}}
@props(['label', 'for'])

<label for="{{ $for }}" class="block cursor-pointer text-sm font-medium text-gray-100">
    {{ $label }}
</label>