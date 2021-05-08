@php
    $attributes = $attributes->merge($attrs);
@endphp

<x-dynamic-component :component="$props['name']" {{ $attributes }} />
