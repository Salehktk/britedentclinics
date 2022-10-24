<?php

namespace App\View\Components\DashboardCards;

use Illuminate\View\Component;

class PatientSideCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-cards.patient-side-card');
    }
}
