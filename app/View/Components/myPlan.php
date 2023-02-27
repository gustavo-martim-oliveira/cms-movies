<?php

namespace App\View\Components;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class myPlan extends Component
{

    private $plan;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = User::find(Auth::id());
        $this->plan = $user->activePlan();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = User::find(Auth::id());
        $plan = $this->plan;
        if($plan == false || $plan->details->value == 0){
            $plan->total_days = 100;
            $plan->left_days = 100;
        }else{
            $plan->total_days = Carbon::parse($plan->start)->diffInDays(Carbon::parse($plan->end));
            $plan->left_days = Carbon::parse($plan->start)->diffInDays(now());
            if($plan->left_days == 0) $plan->left_days ++;
        }
        return view('components.my-plan', compact('plan', 'user'));
    }
}
