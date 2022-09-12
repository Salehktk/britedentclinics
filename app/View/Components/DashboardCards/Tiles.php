<?php

namespace App\View\Components\DashboardCards;

use Illuminate\View\Component;

class Tiles extends Component
{
    public $name;
    public $icon;
    public $count;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $icon, $count)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-cards.tiles');
    }
}
