<div class="lv-modal-form lv-block d-inline-block">
    {{-- The whole world belongs to you. --}}
    <button type="button" wire:click="createShowModal" class="btn btn-dark mt-3 mb-3">
        {{ __($btnText) }}
    </button>
<form wire:submit.prevent="submit" class="d-inline-block ml-2 mt-sm--3">
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            @section('title', __($title))
            <div  class="{{ $gridClass }} row" >
                @foreach($this->fields() as $field)
                    {{ $field->render()->with($field->data()) }}
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer">
            @foreach($this->buttons() as $button)
                {{ $button->render()->with($button->data()) }}
            @endforeach
        </x-slot>
    </x-jet-dialog-modal>
</form>
</div>
