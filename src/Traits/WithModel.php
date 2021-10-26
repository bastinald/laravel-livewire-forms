<?php

namespace Bastinald\LaravelLivewireForms\Traits;

use Illuminate\Support\Arr;

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

    /**
     * Add attributes to the input field.
     *
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function addAttrs(array $attrs) {
        if (Arr::isAssoc($attrs)) {
            $this->attrs = array_merge($this->attrs, $attrs);
        }
        return $this;
    }
}
