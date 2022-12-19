<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Bastinald\LaravelLivewireForms\Components\Button;
use Bastinald\LaravelLivewireForms\Components\FormComponent;
use Bastinald\LaravelLivewireForms\Components\Input;
use Livewire\Component;
use Livewire\WithFileUploads;


class ModalFormComponent extends FormComponent
{

    public $program = null;
    public $btnTitle = "Add Student";
    public $modalTitle = "Add Student";
    public $btnClass = "btn btn-dark ml-2 mt-sm--3";
    public $modalFormVisible = false;
    public $isDropdown = false;
    public $file = null;
    public $team;

    public function createShowModal() {
        $this->modalFormVisible = true;
    }

    public function buttons()
    {
        return [
            Button::make('Cancel', 'dark')->click('$toggle("modalFormVisible")'),
            Button::make()->click('submit'),
        ];
    }

    public function submit()
    {
        $this->data = [];
        $this->modalFormVisible = false;

    }

    public function render()
    {
        return view('laravel-livewire-forms::modal-form-component')
            ->layout($this->layout ?? config('livewire.layout'));
    }
}
