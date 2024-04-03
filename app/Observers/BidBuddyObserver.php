<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\BidBuddy;
use App\Models\Notification;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class BidBuddyObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the BidBuddy "created" event.
     */
    public function created(BidBuddy $bidBuddy): void
    {
        $admin = Admin::first();
        Notification::create([
            'user_id' =>  $admin->user_id,
            'title' => 'ایجاد بید بادی جدید',
            'description' => ' کاربر '.$bidBuddy->user->username .  ' بید بادی جدیدی برای حراجی محصول ' . $bidBuddy->auction->product->title . ' ایجاد کرده است ',
            'for_admin' =>  1,
        ]);
    }

    /**
     * Handle the BidBuddy "updated" event.
     */
    public function updated(BidBuddy $bidBuddy): void
    {
       
    }

    /**
     * Handle the BidBuddy "deleted" event.
     */
    public function deleted(BidBuddy $bidBuddy): void
    {
        //
    }

    /**
     * Handle the BidBuddy "restored" event.
     */
    public function restored(BidBuddy $bidBuddy): void
    {
        //
    }

    /**
     * Handle the BidBuddy "force deleted" event.
     */
    public function forceDeleted(BidBuddy $bidBuddy): void
    {
        //
    }
}
