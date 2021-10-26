@php
    $name = $props['prefix'] . $props['name'];
    $attributes = $attributes->class([
        'form-control' . ($props['plaintext'] ? '-plaintext' : ''),
        'form-control-sm' => $props['small'],
        'form-control-lg' => $props['large'],
        'is-invalid' => $errors->has($name),
        'rounded-end' => !isset($props['append']),
    ])->merge(array_merge($attrs, ['id' => $name]));
@endphp

<div class="{{$gridClass}} {{ !$props['prefix'] ? 'mb-3' : '' }}">
    @isset($props['label'])
        <label for="{{ $name }}" class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    <div class="input-group">
        @isset($props['prepend'])
            <span class="input-group-text">{{ __($props['prepend']) }}</span>
        @endisset

        <input {{ $attributes }} wire:model{{ $props['model'] ?? '' }}="data.{{ $name }}">

        @isset($props['append'])
            <span class="input-group-text rounded-end">{{ __($props['append']) }}</span>
        @endisset

        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
