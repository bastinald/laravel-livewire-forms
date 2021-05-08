<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Illuminate\View\Component;

class Conditional extends Component
{
    public $props = [];

    public static function if($condition, $fields)
    {
        $component = new static;

        $component->props = [
            'conditions' => [[$condition, $fields]],
        ];

        return $component;
    }

    public function elseif($condition, $fields)
    {
        $this->props['conditions'][] = [$condition, $fields];

        return $this;
    }

    public function else($fields)
    {
        $this->props['conditions'][] = [true, $fields];

        return $this;
    }

    public function render()
    {
        return view('laravel-livewire-forms::conditional');
    }
}
