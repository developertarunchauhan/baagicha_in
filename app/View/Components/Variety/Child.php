<?php

namespace App\View\Components\Variety;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Child extends Component
{
    /**
     * Create a new component instance.
     */
    public $child;
    public function __construct($child)
    {
        $this->child = $child;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.variety.child');
    }
}
