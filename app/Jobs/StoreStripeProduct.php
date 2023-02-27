<?php
/**
 *
 * ONLY USE IN STORE PLAN MODE
 *
 */


namespace App\Jobs;

use App\Models\Plan;
use Exception;
use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Stripe\{
    Stripe,
    Product
};
use Stripe\Exception\ApiErrorException;

class StoreStripeProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Check if product exists in the stripe
     * to store then
     *
     * @param integer $product
     * @return void
     */
    protected function checkIfExits(int $product){

        try{
            Product::retrieve($product);
            return true;
        }catch(ApiErrorException $e){
           return false;
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $key = config('services.stripe.secret');
        Stripe::setApiKey($key);
        $plans = Plan::where('value', '>', 0)->get();

        foreach($plans as $plan){
            if(!$this->checkIfExits($plan->id)){
                try{
                    if($plan->period > 0 ){
                        $product = [
                            'id' => $plan->id,
                            'name' => $plan->title,
                            'active' => ($plan->active == 1 ? true : false),
                            'description' => $plan->description,
                            'default_price_data' => [
                                'currency' => 'brl',
                                'unit_amount_decimal' => number_format($plan->value, 2, '', ''),
                                'recurring' => [
                                    'interval' => 'month',
                                    'interval_count' => $plan->period,
                                ]
                            ]
                        ];
                    }else{
                        $product = [
                            'id' => $plan->id,
                            'name' => $plan->title,
                            'active' => ($plan->active == 1 ? true : false),
                            'description' => $plan->description,
                            'default_price_data' => [
                                'currency' => 'brl',
                                'unit_amount_decimal' => number_format($plan->value, 2, '', ''),
                            ]
                        ];
                    }

                    $productDetail = Product::create($product);
                    $plan->update(['stripe_link' => $productDetail->default_price]);
                    $plan->stripe_link = $productDetail->default_price;
                    $plan->save();
                    continue;
                }catch(ApiErrorException $e){
                    Log::error($e);
                    continue;
                }catch(Exception $e){
                    Log::error($e);
                    continue;
                }
            }
        }

        return true;
    }
}
