<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrashOption extends Component
{
    /**
     * Create a new component instance.
     */
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.trash-option');
    }
}
