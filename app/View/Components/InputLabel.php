<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputLabel extends Component
{
    public $name;
    public $for;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $for, $required = null)
    {
        $this->name = $name;
        $this->for = $for;
        $this->required = $required;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-label');
    }
}
