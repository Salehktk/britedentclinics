<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppointmentBookingForm extends Component
{
    public $patient_id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($patientId = null)
    {
        $this->patient_id = $patientId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.appointment-booking-form');
    }
}
