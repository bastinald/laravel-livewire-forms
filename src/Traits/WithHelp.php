<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithHelp
{
    public function help($help)
    {
        $this->props['help'] = $help;

        return $this;
    }
}
