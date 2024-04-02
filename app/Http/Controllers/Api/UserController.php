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
    public function getNotifications()
    {
        // geting all new notifications with msg and count + all new tickets with count
        return response()->json([
            'tickets' => 8,
            'notifications'=>4

        ], 200);
    }
    public function update(Request $request)
    {
        $request->validate([
            'username' =>  'required',
            'email' =>  'required|email',
            'birth_date' =>  'required',
            'city_id' =>  'required',

        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->bio = $request->bio;
        $user->city_id = $request->city_id;
        $user->save();
        return new UserResource($user->load('city'));
    }
    public function setAvatar(Request $request)
    {

        $request->validate([

            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5048'],

        ]);
        try {
            $path = $this->UploadFile($request->file('avatar'), 'images/user_profiles'); //use the method in the trait
            // $user = User::where('id', Auth::user()->id)->update([
            //     'profile_pic' => $path
            // ]);
            $user = Auth::user();
            $user->profile_pic = $path;
            $user->save();

            return new UserResource($user->load('city'));
        } catch (\Exception $e) {

            return response()->json([
                'error' => "failed to upload avatar",

            ], 403);
        }
    }
}
