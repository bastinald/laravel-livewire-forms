<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithModel
{
    public function instant()
    {
        $this->props['model'] = null;

        return $this;
    }

    public function defer()
    {
        $this->props['model'] = '.defer';

        return $this;
    }

    public function lazy()
    {
        $this->props['model'] = '.lazy';

        return $this;
    }

    public function debounce($ms = 500)
    {
        $this->props['model'] = '.debounce.' . $ms . 'ms';

        return $this;
    }
}
