<?php

namespace App\View\Components\Card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $all;
    public $add;
    public $trash;
    public function __construct($all, $add, $trash, $title)
    {
        $this->title = $title;
        $this->add = $add;
        $this->trash = $trash;
        $this->all = $all;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.header');
    }
}
