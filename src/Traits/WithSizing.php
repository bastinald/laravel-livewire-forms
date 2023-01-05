<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithSizing
{
    /**
     * CSS Class for input wrapper.
     *
     * @var string
     */
    public $gridClass = 'd-block w-full';
    protected $colClasses = "col-md-6";

    public function setColClass($classes="") {
        $this->colClasses = $classes;
        return $this;
    }

    public function getColClass() {
        return $this->colClasses;
    }

    /**
     * Set CSS Class for input wrapper.
     *
     * @param string $classes
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function containerSize($classes='d-block w-full') {
        $this->gridClass = $classes;
        return $this;
    }


}
