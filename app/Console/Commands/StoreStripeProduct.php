<?php

namespace App\Console\Commands;

use App\Jobs\StoreStripeProduct as JobStoreProduct;
use Illuminate\Console\Command;

class StoreStripeProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store-stripe-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store newest plan to stripe product api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        JobStoreProduct::dispatch();
        return Command::SUCCESS;
    }
}
