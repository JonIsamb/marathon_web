{{-- props direction --}}

@props(['direction'])

{{-- if direction is row --}}
@if($direction == 'row')
    <div class="flex flex-row">
        {{ $slot }}
    </div>
@else
    <div class="flex flex-col">
        {{ $slot }}
    </div>
@endif
