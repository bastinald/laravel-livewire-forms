<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithPlaceholder
{
    public function placeholder($placeholder)
    {
        $this->attrs['placeholder'] = $placeholder;

        return $this;
    }
}
