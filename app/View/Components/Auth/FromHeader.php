<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class FromHeader extends Component
{
    public $head = null;
    public $headtest = null;

    /**
     * Create a new component instance.
     *
     * @return void
     * 
     */
    public function __construct($head, $headtest)
    {
        $this->head = $head;
        $this->headtest = $headtest;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth.from-header');
    }
}
