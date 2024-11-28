<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function Illuminate\Log\log;

class CreateSubjectModal extends Component
{

    public $group;
    /**
     * Create a new component instance.
     */
    public function __construct($group)
    {

        $this->group = $group;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-subject-modal');
    }
}
