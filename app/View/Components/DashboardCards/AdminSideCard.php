<?php

namespace App\View\Components\DashboardCards;

use App\Helper\BaseQuery;
use Illuminate\View\Component;

class AdminSideCard extends Component
{
    use BaseQuery;

    public $doctors = null;
    public $patients = null;
    public $receptionist = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->doctors = $this->all_user_with_role('doctor')->count();
        $this->patients = $this->all_user_with_role('patient')->count();
        $this->receptionist = $this->all_user_with_role('receptionist')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-cards.admin-side-card');
    }
}
