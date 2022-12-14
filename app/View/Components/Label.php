<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    public $for;
    public $label;

    public function __construct()
    {
        $this->for = $for ?? null;
        $this->label = $label ?? null;
    }

    public function render()
    {
        return view('components.label');
    }
}
