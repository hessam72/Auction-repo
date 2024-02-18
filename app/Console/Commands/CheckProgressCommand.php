<?php

namespace App\Console\Commands;

use App\Models\HighestBidderLevel;
use App\Models\User;
use Illuminate\Console\Command;

class CheckProgressCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-progress-command';

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
       // check users heighest bidder level
       $users=User::where('status' , 1)->get();
       // $hb_levels=HighestBidderLevel::all();
       foreach($users as $user){
           if($user_level=$user->highest_bidders){
               //user has highest bidders
               $hb_level=$user_level->highest_bidder_level;
               $secounds_needed= $hb_level->time_needed * 60*60;
              // checking for completing highest bidder level
               if($user_level->time_spent >= $secounds_needed){
                   // user has complete his level
                   // rewarding him the bids
                   $user->bid_amount = $user->bid_amount +  $hb_level->bid_reward;
                   $user->save();
                   
                   //upgrading hb level
                   $next_level=HighestBidderLevel::where('time_needed'  ,'>', $hb_level->time_needed)
                   ->orderBy('time_needed', 'ASC')->first();
                   if($next_level){
                       $user_level->current_level_id =  $next_level->id;
                       $user_level->save();
   
                   }
               }
           
           }
       }
     
    }
}
