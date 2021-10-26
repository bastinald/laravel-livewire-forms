@php
    $name = $props['prefix'] . $props['name'];
    $attributes = $attributes->class([
        'form-control form-control-color',
        'form-control-sm' => $props['small'],
        'form-control-lg' => $props['large'],
        'border-danger' => $errors->has($name),
    ])->merge(array_merge($attrs, ['id' => $name]));
@endphp

<div class="{{$gridClass}} {{ !$props['prefix'] ? 'mb-3' : '' }}">
    @isset($props['label'])
        <label for="{{ $name }}" class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    <input {{ $attributes }} wire:model{{ $props['model'] ?? '' }}="data.{{ $name }}"/>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
