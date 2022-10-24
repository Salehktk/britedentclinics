<?php

namespace App\View\Components;

use App\Helper\BaseQuery;
use App\Models\Specialization;
use Illuminate\View\Component;

class SpecializationList extends Component
{
    use BaseQuery;

    public $specialization = null;
    public $specializationId = null;
    public $showLabel = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($specializationId = null, $showLabel = null)
    {
        $this->specialization = $this->get_all(new Specialization());
        $this->specializationId = $specializationId;
        $this->showLabel = $showLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.specialization-list');
    }
}
