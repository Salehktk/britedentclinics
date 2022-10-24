<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    public $type;
    public $name;
    public $id;
    public $place;
    public $val;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $id, $place, $val, $required)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->place = $place;
        $this->val = $val;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-field');
    }
}
