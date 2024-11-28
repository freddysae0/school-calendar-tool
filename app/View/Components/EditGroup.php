<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class EditGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public $group;
    public function __construct($group)
    {
        $this->group = $group;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-group');
    }
}
