<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Bastinald\LaravelLivewireForms\Traits\WithDisabled;
use Bastinald\LaravelLivewireForms\Traits\WithHelp;
use Bastinald\LaravelLivewireForms\Traits\WithPrefix;
use Illuminate\View\Component;

class Row extends Component
{
    use WithHelp, WithDisabled;
    use WithPrefix;

    public $props = [];
    public $attrs = [];
    public $column_class = "col-md-6 mb-2 mb-md-0";
    public $row_class = "row";


    public static function make($label = null)
    {
        $component = new static;

        $component->props = [
            // 'name' => $name,
            'label' => $label,
            'fields' => [],
            'help' => null,
        ];

        $component->attrs = [
            'disabled' => false,
        ];

        return $component;
    }

    public function fields($fields = [])
    {
        $this->props['fields'] = $fields;

        return $this;
    }

    public function isColumn($field) {
        return Column::class == get_class($field);
    }

    public function col_size($col="mb-2") {
        $this->column_class = "$col mb-2 mb-md-0";
        return $this;
    }

    public function render()
    {
        $row = $this;
        return view('laravel-livewire-forms::row', compact('row'));
    }
}
