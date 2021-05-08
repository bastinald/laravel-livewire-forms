@section('title', __($title))

<form>
    @foreach($this->fields() as $field)
        {{ $field->render()->with($field->data()) }}
    @endforeach

    @foreach($this->buttons() as $button)
        {{ $button->render()->with($button->data()) }}
    @endforeach
</form>
