@section('title', __($title))

<form>
    @foreach($this->fields() as $field)
        {{ $field->render()->with($field->data()) }}
    @endforeach

    <div class="d-flex justify-content-end gap-2">
        @foreach($this->buttons() as $button)
            {{ $button->render()->with($button->data()) }}
        @endforeach
    </div>
</form>
