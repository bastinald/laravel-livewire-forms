<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Bastinald\LaravelLivewireForms\Traits\WithDisabled;
use Bastinald\LaravelLivewireForms\Traits\WithHelp;
use Bastinald\LaravelLivewireForms\Traits\WithModel;
use Bastinald\LaravelLivewireForms\Traits\WithPlaceholder;
use Bastinald\LaravelLivewireForms\Traits\WithPrefix;
use Bastinald\LaravelLivewireForms\Traits\WithReadonly;
use Bastinald\LaravelLivewireForms\Traits\WithSizing;
use Illuminate\View\Component;

class Textarea extends Component
{
    use WithPrefix, WithSizing, WithHelp, WithModel, WithDisabled, WithReadonly, WithPlaceholder;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null)
    {
        $component = new static;

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'small' => false,
            'large' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'rows' => 3,
            'disabled' => false,
            'readonly' => false,
        ];

        return $component;
    }

    public function rows($rows = 3)
    {
        $this->attrs['rows'] = $rows;

        return $this;
    }

    public function render()
    {
        return view('laravel-livewire-forms::textarea');
    }
}
