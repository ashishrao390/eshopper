<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotificationComponent extends Component
{
    public $msg, $cls;
    /**
     * Create a new component instance.
     */
    public function __construct($msg, $cls)
    {
        $this->msg = $msg;
        $this->cls = $cls;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification-component');
    }
}
