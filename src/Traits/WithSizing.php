<?php

namespace Bastinald\LaravelLivewireForms\Traits;

trait WithSizing
{
    /**
     * CSS Class for input wrapper.
     *
     * @var string
     */
    public $gridClass = 'col-md-12';


    /**
     * Set the input size to small
     *
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function small()
    {
        $this->props['small'] = true;

        return $this;
    }

    /**
     * Set the input size to large
     *
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function large()
    {
        $this->props['large'] = true;
        return $this;
    }

    /**
     * Set CSS Class for input wrapper.
     *
     * @param string $classes
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function col_size($classes='col-md-12') {
        $this->gridClass = $classes;
        return $this;
    }

    /**
     * Set CSS Class for input wrapper as small.
     *
     * @param string $classes   Default: col-md-4 col-sm-6 col-xs-12
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function col_sm($classes='col-md-4 col-sm-6 col-xs-12') {
        return $this->col_size($classes);
    }

    /**
     * Set CSS Class for input wrapper as mediun.
     *
     * @param string $classes   Default: col-md-4 col-sm-6 col-xs-12
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function col_md($classes='col-md-4 col-sm-6 col-xs-12') {
        return $this->col_size($classes);
    }

    /**
     * Set CSS Class for input wrapper as large.
     *
     * @param string $classes   Default: col-md-12 col-lg-6
     * @return mixed|Illuminate\View\Component    Return the current object.
     */
    public function col_lg($classes='col-md-12 col-lg-6') {
        return $this->col_size($classes);
    }


}
