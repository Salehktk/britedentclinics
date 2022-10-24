<?php

namespace App\View\Components;

use App\Models\Field;
use Illuminate\View\Component;

class FieldsById extends Component
{
    public $fields = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fields)
    {
        $this->fields = Field::where('service_id', $fields)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields-by-id');
    }
}
