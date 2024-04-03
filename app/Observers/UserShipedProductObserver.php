<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\UserShipedProduct;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class UserShipedProductObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the UserShipedProduct "created" event.
     */
    public function created(UserShipedProduct $userShipedProduct): void
    {
        //
    }

    /**
     * Handle the UserShipedProduct "updated" event.
     */
    public function updated(UserShipedProduct $userShipedProduct): void
    {
        $admin = Admin::first();
        if ($userShipedProduct->wasChanged('status')) {
            // status has changed
            if ($userShipedProduct->status === 100) {
                //its payment done

                Notification::create([
                    'user_id' =>  $admin->user_id,
                    'title' => 'ثبت خرید جدید',
                    'description' => ' کاربر ' . $userShipedProduct->user->username . '  محصول ' . $userShipedProduct->product->title . ' با قیمت ' . $userShipedProduct->price . ' دلار خریداری کرد. ',
                    'for_admin' =>  1,
                ]);
            }
        }
    }

    /**
     * Handle the UserShipedProduct "deleted" event.
     */
    public function deleted(UserShipedProduct $userShipedProduct): void
    {
        //
    }

    /**
     * Handle the UserShipedProduct "restored" event.
     */
    public function restored(UserShipedProduct $userShipedProduct): void
    {
        //
    }

    /**
     * Handle the UserShipedProduct "force deleted" event.
     */
    public function forceDeleted(UserShipedProduct $userShipedProduct): void
    {
        //
    }
}
