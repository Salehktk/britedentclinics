<?php

namespace App\View\Components;

use App\Models\Location;
use Illuminate\View\Component;

class LocationList extends Component
{
    public $locations = null;
    public $showLabel = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showLabel = null)
    {
        $this->locations = Location::all();
        $this->showLabel = $showLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.location-list');
    }
}
