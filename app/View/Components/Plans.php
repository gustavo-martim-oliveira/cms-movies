<?php

namespace App\View\Components;

use App\Models\Plan;
use Illuminate\View\Component;

class Plans extends Component
{

    private $plans;
    public $class = 'col-12 col-md-6 col-lg-4 order-md-2 order-lg-1';
    public $checkout = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($checkout = false, object|bool $plan = false)
    {
        if($checkout) {
            $this->class = 'col-12';
            $this->checkout = $checkout;
        }

        $plans = Plan::where('active', true)->orderBy('value', 'asc')->get();
        if(!$plan){
            $this->plans = $plans;
        }else{
            $this->plans = Plan::where('id', $plan->id)->get();
        }

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
