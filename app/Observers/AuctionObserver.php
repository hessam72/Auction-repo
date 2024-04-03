<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Auction;
use App\Models\Notification;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class AuctionObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Auction "created" event.
     */
    public function created(Auction $auction): void
    {
        //
    }

    /**
     * Handle the Auction "updated" event.
     */
    public function updated(Auction $auction): void
    {
        $admin = Admin::first();
        if ($auction->wasChanged('status')) {
            // status has changed
            if ($auction->status === 100) {
                //running
                Notification::create([
                    'user_id' =>  $admin->user_id,
                    'title' => 'شروع حراجی',
                    'description' => ' حراجی محصول '.$auction->product->title.' آغاز شد',
                    'for_admin' =>  1,
                ]);
            } elseif ($auction->status === 3) {
                //finished
                Notification::create([
                    'user_id' =>  $admin->user_id,
                    'title' => 'پایان حراجی',
                    'description' => ' حراجی محصول '.$auction->product->title.' خاتمه یافت.',
                    'for_admin' =>  1,
                ]);
            }
        }
    }

    /**
     * Handle the Auction "deleted" event.
     */
    public function deleted(Auction $auction): void
    {
        //
    }

    /**
     * Handle the Auction "restored" event.
     */
    public function restored(Auction $auction): void
    {
        //
    }

    /**
     * Handle the Auction "force deleted" event.
     */
    public function forceDeleted(Auction $auction): void
    {
        //
    }
}
