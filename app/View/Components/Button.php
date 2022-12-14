<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
   
    public function __construct()
    {
        $this->type = $type ?? null;
    }

    public function render()
    {
        return view('components.button');
    }
}
