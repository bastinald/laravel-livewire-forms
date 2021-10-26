@php
    if ( !empty($props['prefix']) ) {
        $name = $props['prefix'];
    } else {
        $name = '';
    }
@endphp

<div class="{{ $row_class }}">
    @isset($props['label'])
        <label class="form-label">
            {{ __($props['label']) }}
        </label>
    @endisset
    @foreach($props['fields'] as $field)
        @if ( !method_exists($field, 'prefix') )
            {{ $field->render()->with($field->data()) }}
        @else
            <div class="{{ $field->getColClass() ?? 'col-md-6'}} mb-3">
                {{ $field->prefix(rtrim($name, "."))->render()->with($field->data()) }}
            </div>
        @endif
    @endforeach
</div>
