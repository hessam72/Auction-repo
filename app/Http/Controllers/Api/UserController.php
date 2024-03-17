<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Upload;
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
        $user->city_id = $request->city_id;
        $user->save();
        return 'user updated';
    }
    public function setAvatar(Request $request)
    {

        $path = $this->UploadFile($request->file('avatar'), 'images/user_profiles'); //use the method in the trait
        // $user = User::where('id', Auth::user()->id)->update([
        //     'profile_pic' => $path
        // ]);
        $user = Auth::user();
        $user->profile_pic = $path;
        $user->save();
        return new UserResource($user->load('city'));
    }
}
