<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithDisabled
{
    public function disabled($disabled = true)
    {
        $this->attrs['disabled'] = $disabled;

        return $this;
    }
}
