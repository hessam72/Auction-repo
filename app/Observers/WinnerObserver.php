<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\Winner;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class WinnerObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Winner "created" event.
     */
    public function created(Winner $winner): void
    {
        $admin = Admin::first();
        Notification::create([
            'user_id' =>  $admin->user_id,
            'title' => 'اعلام برنده حراجی',
            'description' => ' کاربر ' . $winner->user->username . ' برنده محصول ' . $winner->product->title . ' با قیمت ' . $winner->win_price . ' دلار شد. ',
            'for_admin' =>  1,
        ]);
    }

    /**
     * Handle the Winner "updated" event.
     */
    public function updated(Winner $winner): void
    {
       
       
    }

    /**
     * Handle the Winner "deleted" event.
     */
    public function deleted(Winner $winner): void
    {
        //
    }

    /**
     * Handle the Winner "restored" event.
     */
    public function restored(Winner $winner): void
    {
        //
    }

    /**
     * Handle the Winner "force deleted" event.
     */
    public function forceDeleted(Winner $winner): void
    {
        //
    }
}
