<?php

namespace Bastinald\LaravelLivewireForms\Components;

class FormSliderComponent extends FormComponent {


    public $btnIcon = '';
    public $btnText = 'Execute';
    public $btnAttrs = [];
    public $sliderActive = false;

    public function toggleSlider() {
        $this->sliderActive = ! $this->sliderActive;
    }

    public function showSlider() {
        $this->sliderActive = true;
    }

    public function hideSlider() {
        $this->sliderActive = false;
    }

    public function render()
    {
        return view('laravel-livewire-forms::form-slider-component')
            ->layout($this->layout ?? config('livewire.layout'));
    }

}

?>
