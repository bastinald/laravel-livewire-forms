<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $props = [];

    public static function make($message, $style = 'success')
    {
        $component = new static;

        $component->props = [
            'message' => $message,
            'style' => $style,
            'dismissible' => false,
        ];

        return $component;
    }

    public function dismissible()
    {
        $this->props['dismissible'] = true;

        return $this;
    }

    public function render()
    {
        return view('laravel-livewire-forms::alert');
    }
}
