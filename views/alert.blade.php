@php
    $attributes = $attributes->class([
        'fade show alert alert-' . $props['style'],
        'alert-dismissible' => $props['dismissible'],
    ])->merge();
@endphp

<div {{ $attributes }}>
    {{ __($props['message']) }}

    @if($props['dismissible'])
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    @endif
</div>
