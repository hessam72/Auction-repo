<?php

namespace App\Console;

use App\Console\Commands\DispatchAuctionStarter;
use App\Console\Commands\DispatchAuctionWatcher;
use App\Jobs\AuctionWatcherJob;
use App\Models\BidBuddy;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // currentlly not using watcher for auctionwatcherjob and running it directlly
        dispatch(new DispatchAuctionWatcher());
        // dispatch(new DispatchAuctionStarter());
        // Run every minute (or choose your preferred frequency)
        // $schedule->job(new DispatchAuctionWatcher)
        //     ->everySecond()
        //     ->withoutOverlapping();

        // $schedule->job(new DispatchAuctionStarter)
        //     ->everyMinute()
        //     ->withoutOverlapping();


        //  echo "first ";
        // // Schedule a task to run every minute
        // $schedule->call(function () {
        //     $this->runEverySevenSeconds();
        // })->everyTenSeconds(); // Scheduler runs every minute
    }

    private function runEverySevenSeconds()
    {
        echo "runEverySevenSeconds ask";
        $start = now();
        while (now()->diffInSeconds($start) < 60) {
            if (now()->diffInSeconds($start) % 7 === 0) { // Every 7 seconds
                echo "every 7 sec ask";
                $this->checkConditionAndDispatch();
            }
            sleep(2); // Wait 1 second before checking again
        }
    }

    private function checkConditionAndDispatch()
    {
        // Your condition here
        if ($this->someCondition()) {

            echo "Condition met: DispatchTaskJob dispatched at " . now() . "\n";

            dispatch(new DispatchAuctionWatcher());
        }
    }

    private function someCondition()
    {
        // Replace this with your actual condition
        return rand(0, 1) === 1; // Random true/false for demonstration
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
