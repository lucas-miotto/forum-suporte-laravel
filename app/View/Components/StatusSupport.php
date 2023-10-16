<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        protected string $status,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        $color = 'blue';
        $color = $this->status === 'C' ? 'green' : $color;
        $color = $this->status === 'P' ? 'red' : $color;
        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', compact('textStatus', 'color'));
    }
}
