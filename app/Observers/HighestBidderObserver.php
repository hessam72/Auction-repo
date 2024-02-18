<?php

namespace App\Observers;

use App\Models\HighestBidder;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class HighestBidderObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the HighestBidder "created" event.
     */
    public function created(HighestBidder $highestBidder): void
    {
        // $highestBidder->multiplier=55;
        // $highestBidder->save();
    }

    /**
     * Handle the HighestBidder "updated" event.
     */
    public function updated(HighestBidder $highestBidder):void
    {
        
        
    //  $d= HighestBidder::where('id' , $highestBidder->id)->update(['multiplier' => 6]);
     
    
      
    }

    /**
     * Handle the HighestBidder "deleted" event.
     */
    public function deleted(HighestBidder $highestBidder): void
    {
        //
    }

    /**
     * Handle the HighestBidder "restored" event.
     */
    public function restored(HighestBidder $highestBidder): void
    {
        //
    }

    /**
     * Handle the HighestBidder "force deleted" event.
     */
    public function forceDeleted(HighestBidder $highestBidder): void
    {
        //
    }
}
