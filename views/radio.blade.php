@php
    $name = $props['prefix'] . $props['name'];
    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($name),
    ]);
@endphp

<div class="{{$gridClass}} {{ !$props['prefix'] ? 'mb-3' : '' }}">
    @isset($props['label'])
        <label class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    @foreach($props['options'] as $value => $label)
        <div class="form-check {{ $props['switch'] ? 'form-switch' : '' }}">
            <input {{ $attributes->merge([
                          'id' => $name . '.' . $loop->index,
                          'type' => $attrs['type'],
                          'disabled' => $attrs['disabled'],
                          'name' => $name,
                          'value' => $value,
                      ]) }} wire:model{{ $props['model'] ?? '' }}="data.{{ $name }}">

            <label for="{{ $name . '.' . $loop->index }}" class="form-check-label">
                {{ __($label) }}
            </label>

            @if($loop->last)
                @error($name)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @isset($props['help'])
                    <div class="form-text">{{ __($props['help']) }}</div>
                @endisset
            @endif
        </div>
    @endforeach
</div>
