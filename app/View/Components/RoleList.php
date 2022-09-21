<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoleList extends Component
{
    public $roles = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->roles = \Spatie\Permission\Models\Role::where('name', '!=', 'admin')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.role-list');
    }
}
