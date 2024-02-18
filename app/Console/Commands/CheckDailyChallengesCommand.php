<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckDailyChallengesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-daily-challenges-command';

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
    $challenges = Challenge::where('time_type', 'daily')->get();
    $users = User::all();
    foreach ($users as $user) {
        foreach ($user->challenges as $user_challenge) {
            // check user progress in specific challenge
            if ($user_challenge->pivot->status === 1) {
                //challenge is active

                // check for the type of challenge
                // 1 = bidding  - 2= winning auction (both in spec category)
                if ($user_challenge->type === 1) {
                    //bidding

                    //count user bids in past 24h
                    $past_24h = Carbon::now()->subMinutes(1440);
                   
                    // count of bidding in specific category

                    $count = BiddingHistory::where('created_at', '>=', $past_24h)
                    ->where('category_id' ,$user_challenge->category_id )->count();
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
                    $past_24h = Carbon::now()->subMinutes(1440);
                    // $count = BiddingHistory::where('created_at', '>=', $past_24h)->count();
                        // TODO complete auction win challage chekup
                }
            }
        }
    }
    }
}
