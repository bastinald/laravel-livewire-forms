<?php

namespace Bastinald\LaravelLivewireForms\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class FormComponent extends Component
{
    public $title;
    public $layout;
    public $data = [];

    public function render()
    {
        return view('laravel-livewire-forms::form-component')
            ->layout($this->layout ?? config('livewire.layout'));
    }

    public function data($key, $default = null)
    {
        return Arr::get($this->data, $key, $default);
    }

    public function fields()
    {
        return [];
    }

    public function buttons()
    {
        return [];
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        $validator = Validator::make($this->data, $rules ?? $this->getRules(), $messages, $attributes);
        $validatedData = $validator->validate();

        $this->resetErrorBag();

        return $validatedData;
    }

    public function addArrayableItem($name)
    {
        $array = $this->data($name);
        $key = $array ? max(array_keys($array)) + 1 : 0;

        Arr::set($this->data, $name . '.' . $key, []);
    }

    public function removeArrayableItem($key)
    {
        Arr::forget($this->data, $key);
    }
}
