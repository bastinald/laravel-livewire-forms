@php
    $name = $props['prefix'] . $props['name'];
    $attributes = $attributes->class([
        'form-select',
        'form-select-sm' => $props['small'],
        'form-select-lg' => $props['large'],
        'is-invalid' => $errors->has($name),
    ])->merge(array_merge($attrs, ['id' => $name]));
@endphp

<div class="{{ !$props['prefix'] ? 'mb-3' : '' }}">
    @isset($props['label'])
        <label for="{{ $name }}" class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    <select {{ $attributes }} wire:model{{ $props['model'] ?? '' }}="data.{{ $name }}">
        <option value="">
            {{ $props['placeholder'] ? __($props['placeholder']) : '' }}
        </option>

        @foreach($props['options'] as $value => $label)
            <option value="{{ $value }}">
                {{ $label }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
