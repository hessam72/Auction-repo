<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Notification;
use App\Models\Ticket;
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
        $notifications = Notification::where('user_id', Auth::user()->id)->where('seen', 0)->get();
        $tickets = Ticket::where('user_id', Auth::user()->id)->where('status', 100)->where('reply_to_id', 0)->where('seen', 0)->get();
        return response()->json([
            'tickets' => $tickets,
            'notifications' => $notifications,


        ], 200);
    }
    public function updateNotifications(){
        Notification::where('user_id', Auth::user()->id)->where('seen', 0)->update([
            'seen'=>1
        ]);
        return 'seen saved';
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
