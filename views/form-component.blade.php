@section('title', __($title))

<form  class="{{ $gridClass }}" >
    @foreach($this->fields() as $field)
        {{ $field->render()->with($field->data()) }}
    @endforeach

    <div class="col-md-12">
        <div class="d-flex justify-content-end gap-2">
            @foreach($this->buttons() as $button)
                {{ $button->render()->with($button->data()) }}
            @endforeach
        </div>
    </div>
</form>
