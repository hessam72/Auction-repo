<?php

namespace App\Listeners;

use App\Events\AutoBiddingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenToAutoBidding
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AutoBiddingEvent $event): void
    {
        //
    }
}
