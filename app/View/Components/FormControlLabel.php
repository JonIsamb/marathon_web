<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormControlLabel extends Component
{
    public $label;
    public $name;

    public function __construct()
    {
        $this->label = $label ?? null;
        $this->name = $name ?? null;
    }

    public function render()
    {
        return view('components.form-control-label');
    }
}
