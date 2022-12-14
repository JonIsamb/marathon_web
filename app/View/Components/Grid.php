<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Grid extends Component
{
    public $xs;
    public $sm;
    public $md;
    public $lg;
    public $xl;
    public $iscontainer;
    public $spacing;

    public function __construct()
    {
        $this->xs = $xs ?? null;
        $this->sm = $sm ?? null;
        $this->md = $md ?? null;
        $this->lg = $lg ?? null;
        $this->xl = $xl ?? null;
        $this->iscontainer = $iscontainer ?? null;
        $this->spacing = $spacing ?? null;
    }

   
    public function render()
    {
        return view('components.grid');
    }
}
