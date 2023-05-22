<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Options extends Component
{
    /**
     * Create a new component instance.
     */
    public $model;
    public $url;
    public function __construct($model, $url)
    {
        $this->model = $model;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.options');
    }
}
