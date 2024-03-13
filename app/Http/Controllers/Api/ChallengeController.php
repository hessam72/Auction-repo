<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChallengeResource;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    public function user_challenges(Request $request)
    {

        //  return Auth::user()->challenges;


        $data = DB::table('user_challenges')
            ->join('challenges', 'user_challenges.challenge_id', '=', 'challenges.id')
            ->join('rewards', 'challenges.reward_id', '=', 'rewards.id')
            ->join('categories', 'challenges.category_id', '=', 'categories.id')
            ->select('user_challenges.*', 'challenges.*','rewards.amount as reward_amount', 'rewards.type as reward_type','categories.title as category_name')
            ->where('user_challenges.user_id', Auth::user()->id)
            ->get();

       

        return new ChallengeResource($data);
    }
}
