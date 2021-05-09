@foreach($props['conditions'] as $condition)
    @if($condition[0])
        @foreach($condition[1] as $field)
            {{ $field->render()->with($field->data()) }}
        @endforeach
        @break
    @endif
@endforeach
