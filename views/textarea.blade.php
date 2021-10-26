@php
    $name = $props['prefix'] . $props['name'];
    $attributes = $attributes->class([
        'form-control',
        'form-control-sm' => $props['small'],
        'form-control-lg' => $props['large'],
        'is-invalid' => $errors->has($name),
    ])->merge(array_merge($attrs, ['id' => $name]));
@endphp

<div class="{{$gridClass}} {{ !$props['prefix'] ? 'mb-3' : '' }}">
    @isset($props['label'])
        <label for="{{ $name }}" class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    <textarea {{ $attributes }} wire:model{{ $props['model'] ?? '' }}="data.{{ $name }}"></textarea>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
