<?php

namespace App\Console;

use App\Models\BidBuddy;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->everyMinute()->appendOutputTo("scheduler-output.log");
        //auction main thread
        // $schedule->command('app:my-test-command')
        // ->runInBackground()
        // ->everyTwoSeconds()
        // ->withoutOverlapping()
        // ->appendOutputTo("scheduler-output.log");

        $schedule->command('app:check-progress-command')
        ->runInBackground()
        ->everyFiveSeconds()
        ->appendOutputTo("scheduler-output.log");
        // check for highest bidder level and challenges progress every hour



        // $schedule->call('App\Http\Controllers\firstController@index')
        //      ->everyMinute()->name('firstController_cronjob')->withoutOverlapping();
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
