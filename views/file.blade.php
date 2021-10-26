@php
    $name = $props['prefix'] . $props['name'];
    $hasErrors = $errors->has($name);
    $attributes = $attributes->class([
        'd-none',
    ])->merge(array_merge($attrs, ['id' => $name]));
@endphp

<div class="{{$gridClass}} {{ !$props['prefix'] ? 'mb-3' : '' }}">
    @isset($props['label'])
        <label class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    <div class="list-group">
        @if($file = $this->data($name))
            @if(is_array($file))
                @foreach($file as $fileItem)
                    @include('laravel-livewire-forms::file-item', ['file' => $fileItem])
                @endforeach
            @else
                @include('laravel-livewire-forms::file-item')
            @endif
        @endif
        <label for="{{ $name }}" role="button"
            class="list-group-item list-group-item-action
                    {{ $attrs['disabled'] ? 'disabled' : 'text-primary' }}
                    {{ $hasErrors ? 'text-danger border-danger' : '' }}">
            {{ $attrs['multiple'] ? __('Choose Files') : __('Choose File') }}
        </label>
    </div>

    <input {{ $attributes }} wire:model="data.{{ $name }}">

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
