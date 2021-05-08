<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithSwitch
{
    public function switch()
    {
        $this->props['switch'] = true;

        return $this;
    }
}
