@php
    $attributes = $attributes->class([
        'btn btn-' . $props['style'],
        'w-100' => $props['block'],
    ])->merge($attrs);
@endphp

<a {{ $attributes }}>
    {{ __($props['label']) }}
</a>
