<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public $school_id;
    public function __construct($school)
    {
        $this->school_id = $school;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-group');
    }
}
