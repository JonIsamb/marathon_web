@props(['xs', 'sm', 'md', 'lg', 'xl', 'iscontainer', 'spacing'])


{{-- if container --}}
@if($iscontainer)
    <div class="grid grid-cols-12 {{ $spacing ? "gap-$spacing" : '' }}">
        {{ $slot }}
    </div>
@else

    <div class="bg-green-300 {{$xs ? "col-span-$xs" : ''}} {{$sm ? "sm:col-span-$sm" : ''}} {{ $md ? "md:col-span-$md" : '' }} {{ $lg ? "lg:col-span-$lg" : ''}} {{ $xl ? "xl:col-span-$xl" : ''}}">
        {{ $slot }}
    </div>

@endif
