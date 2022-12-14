<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;

    public function __construct()
    {
        $this->name = $name ?? null;
    }

    public function render()
    {
        return view('components.input');
    }
}
