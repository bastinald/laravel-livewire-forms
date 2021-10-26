@php
    $name = $props['name'];
    $hasErrors = $errors->has($name);
@endphp

<div class="mb-3">
    @isset($props['label'])
        <label class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset

    <div class="list-group">
        @foreach($this->data($name, []) as $key => $value)
            <div class="list-group-item {{ $hasErrors ? 'border-danger' : '' }}">
                <div class="row align-items-center gx-3">
                    @foreach($props['fields'] as $field)
                        <div class="col-md mb-2 mb-md-0">
                            {{ $field->prefix($name . '.' . $key)->render()->with($field->data()) }}
                        </div>
                    @endforeach
                    <div class="col-md-auto">
                        <button type="button" class="btn-close px-2 btn-danger"
                            wire:click="removeArrayableItem('{{ $name . '.' . $key }}')">
                            X
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <button type="button"
            class="list-group-item list-group-item-action
                    {{ $attrs['disabled'] ? 'disabled' : 'text-primary' }}
                    {{ $hasErrors ? 'text-danger border-danger' : '' }}"
            wire:click="addArrayableItem('{{ $name }}')">
            {{ __('Add ' . Str::singular($props['label'] ?? str_replace('_', ' ', Str::snake($name)))) }}
        </button>
    </div>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    @isset($props['help'])
        <div class="form-text">{{ __($props['help']) }}</div>
    @endisset
</div>
