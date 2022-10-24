<?php

namespace App\View\Components;

use App\Http\Controllers\DoctorServicesController;
use Illuminate\View\Component;

class DoctorServiceFieldsList extends Component
{
    public $doctor_services = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, DoctorServicesController $fields_controller)
    {
        $this->doctor_services = $fields_controller->get_doctor_services($id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.doctor-service-fields-list');
    }
}
