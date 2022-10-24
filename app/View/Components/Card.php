<?php

namespace App\View\Components;

use App\Helper\BaseQuery;
use Illuminate\View\Component;

class Card extends Component
{
    use BaseQuery;

    public $cardTitle = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardTitle)
    {
        $this->cardTitle = $cardTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
