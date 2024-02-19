<?php

namespace App\Console\Commands;

use App\Models\BiddingHistory;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Console\Command;

class checkWeeklyChallengesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-weekly-challenges-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // fetch daily challenges
        $users = User::where('status' , 1)->get();
        $past_week = Carbon::now()->subMinutes(10080);

        foreach ($users as $user) {
            foreach ($user->challenges as $user_challenge) {
                // check user progress in specific challenge

                if ($user_challenge->pivot->status === 1 && $user_challenge->time_type === 2) {
                    //challenge is active and is daily

                    // check for the type of challenge
                    // 1 = bidding  - 2= winning auction (both in spec category)
                    if ($user_challenge->type === 1) {
                        //bidding

                        //count user bids in past 24h

                        // count of bidding in specific category

                        $count = BiddingHistory::where('created_at', '>=', $past_week)
                            ->where('category_id', $user_challenge->category_id)->count();
                        if ($count >= $user_challenge->number_to_win) {
                            // user has won the chalenge
                            //rewarding bid to user
                            $user->bid_amount = $user->bid_amount + $user_challenge->reward->amount;
                            $user->save();
                            //update user challeng to won 
                            $user->challenges()->updateExistingPivot($user_challenge->id, ['status' => 3]);
                        }
                    } elseif ($user_challenge->type === 2) {
                        //auction winning
                       
                        $product_ids = [];
                        foreach ($user_challenge->category->products as $product) {
                            $product_ids[] = $product->id;
                        }

                        //check user wins in past 24h in specific product ids array
                        $count = Winner::where('user_id', $user->id)->where('created_at', '>=', $past_week)
                            ->whereIn('product_id', $product_ids)->count();

                        if ($count >= $user_challenge->number_to_win) {
                            $user->bid_amount = $user->bid_amount + $user_challenge->reward->amount;
                            $user->save();
                            //update user challeng to won 
                            $user->challenges()->updateExistingPivot($user_challenge->id, ['status' => 3]);
                        }
                    }
                }
            }
        }
    }
}
