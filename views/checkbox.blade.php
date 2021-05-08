@php
    $name = $props['prefix'] . $props['name'];
    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($name),
    ])->merge(array_merge($attrs, ['id' => $name]));
@endphp

<div class="form-check {{ $props['switch'] ? 'form-switch' : '' }} {{ !$props['prefix'] ? 'mb-3' : '' }}">
    <input {{ $attributes }} wire:model{{ $props['model'] ?? '' }}="data.{{ $name }}">

    <label for="{{ $name }}" class="form-check-label">
        {{ __($props['label']) }}
    </label>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
