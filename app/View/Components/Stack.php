<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stack extends Component
{
    public $direction;
    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->direction = $direction ?? null;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stack');
    }
}
