<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithSizing
{
    public function small()
    {
        $this->props['small'] = true;

        return $this;
    }

    public function large()
    {
        $this->props['large'] = true;

        return $this;
    }
}
