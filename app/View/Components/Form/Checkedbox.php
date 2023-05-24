<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkedbox extends Component
{
    /**
     * Create a new component instance.
     */
    public $list;
    public $checked;
    public function __construct($list, $checked)
    {
        $this->list = $list;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkedbox');
    }
}
