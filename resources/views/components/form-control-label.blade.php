@props(['label', 'name'])


<div class="flex-col">
    <x-label :label="$label" :for="$name" />
    <x-input :name="$name" />
</div>