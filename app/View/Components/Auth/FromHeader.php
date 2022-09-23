<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class FromHeader extends Component
{

    public $heading;
    public $header_p;

    /**
     * Create a new component instance.
     *
     * @return void
     * 
     * 
     */
    public function __construct($heading, $header_p)
    {
       $this->heading = $heading;
       $this->header_p = $header_p;
       
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
