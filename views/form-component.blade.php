@section('title', __($title))

<form>
    <div class="pb-0 {{ $container ? $container . '-body' : '' }}">
        @foreach($this->fields() as $field)
            {{ $field->render()->with($field->data()) }}
        @endforeach
    </div>

    <div class="text-end {{ $container ? $container . '-footer' : '' }}">
        @foreach($this->buttons() as $button)
            {{ $button->render()->with($button->data()) }}
        @endforeach
    </div>
</form>
