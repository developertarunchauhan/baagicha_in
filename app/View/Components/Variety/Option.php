<?php

namespace App\View\Components\Variety;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Option extends Component
{
    /**
     * Create a new component instance.
     */
    public $children;
    public $margin;
    public function __construct($children, $margin)
    {
        $this->children = $children;
        $this->margin = $margin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.variety.option');
    }
}
