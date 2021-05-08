<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $props = [];
    public $attrs = [];

    public static function make($label = 'Submit', $style = 'primary')
    {
        $component = new static;

        $component->props = [
            'label' => $label,
            'style' => $style,
            'block' => false,
        ];

        return $component;
    }

    public function block()
    {
        $this->props['block'] = true;

        return $this;
    }

    public function click($action)
    {
        $this->attrs['wire:click'] = $action;

        return $this;
    }

    public function href($href)
    {
        $this->attrs['href'] = $href;

        return $this;
    }

    public function route($name)
    {
        return $this->href(route($name));
    }

    public function url($path)
    {
        return $this->href(url($path));
    }

    public function render()
    {
        return view('laravel-livewire-forms::button');
    }
}
