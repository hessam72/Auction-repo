<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {

        // load conditional data based on request
        $user = Auth::user();

        if ($request->has('load')) {
            return new UserResource($user->load($request->load));
        }

        return new UserResource($user);
        // return new UserResource($user->load(['bookmarks' , 'bidding_histories' , 'highest_bidders']));


    }

    public function update(Request $request)
    {
   

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->bio = $request->bio;
        $user->save();
        return 'user updated';
    }
}
