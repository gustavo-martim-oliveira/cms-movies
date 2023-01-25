<?php

namespace App\View\Components;

use App\Models\Plan;
use Illuminate\View\Component;

class Plans extends Component
{

    private $plans;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $plans = Plan::where('active', true)->orderBy('value', 'asc')->get();
        $this->plans = $plans;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $plans = $this->plans;
        return view('components.plans', compact('plans'));
    }
}
