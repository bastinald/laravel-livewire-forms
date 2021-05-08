<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Bastinald\LaravelLivewireForms\Traits\WithDisabled;
use Bastinald\LaravelLivewireForms\Traits\WithHelp;
use Bastinald\LaravelLivewireForms\Traits\WithModel;
use Bastinald\LaravelLivewireForms\Traits\WithOptions;
use Bastinald\LaravelLivewireForms\Traits\WithPrefix;
use Bastinald\LaravelLivewireForms\Traits\WithSwitch;
use Illuminate\View\Component;

class Radio extends Component
{
    use WithPrefix, WithOptions, WithSwitch, WithHelp, WithModel, WithDisabled;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null)
    {
        $component = new static;

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'options' => [],
            'switch' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'type' => 'radio',
            'disabled' => false,
        ];

        return $component;
    }

    public function render()
    {
        return view('laravel-livewire-forms::radio');
    }
}
