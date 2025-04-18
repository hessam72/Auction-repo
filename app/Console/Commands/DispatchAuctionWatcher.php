<?php

namespace App\Console\Commands;

use App\Jobs\AuctionStarterJob;
use App\Jobs\AuctionWatcherJob;
use Illuminate\Console\Command;

class DispatchAuctionWatcher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:task';
    protected $description = 'Dispatch a job every second';
    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    // this is the starter of auction's kernel
    public function handle()
    {
        set_time_limit(0); // Prevent timeout

        while (true) {
            dispatch(new AuctionWatcherJob())->delay(now()->addSeconds(2));
          
            sleep(2); // Wait 1 second before dispatching again
        }
    }
}
