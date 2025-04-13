<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\Otp;
use App\Models\User;
use App\Models\UserChallenge;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function login(Request $request)
    {


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        




        if (!$token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }
        return response([
            'status' => 'success',
            'token' => $token,
            'user' => Auth::user(),
            'city' => Auth::user()->city
        ])
            ->header('Authorization', $token);
    }
    public function sendCode(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $digits = 4;
        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        Otp::create([
            'code' => $code,
            'email' => $request->email,
            'expiration_date' => Carbon::now()->addMinutes(5),
        ]);


        return response([
            'status' => 'success',
            'data' => "code sent to " . $request->email

        ]);
    }
    public function changePassword(Request $request)
    {


        $request->validate([
            'email' => ['required', 'email'],
            'new_password' => ['required'],
            'code' => ['required'],
        ]);
        $otpCode = $request->code;
        // Check if the OTP exists and matches
        $code = Otp::where('code', $otpCode)->where('email', $request->email)->first();

        if (empty($code)) {
            return response([
                'status' => 'error',
                'data' => 'Invalid OTP or ' . 'Email' . '.'
            ], 402);
        }

        // Check if the OTP has expired
        if (Carbon::now() > $code->expiration_date) {
            return response([
                'status' => 'error',
                'data' => 'Code Has Been Expired'
            ], 403);
        }
        // Retrieve the user by phone or email
        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            // register new user

            $user->password = Hash::make($request->new_password);
            $user->save();
        } else {
            return response([
                'status' => 'error',
                'data' => 'No User with email ' . $request->email . ' found'
            ], 404);
        }

        return response([
            'status' => 'success',
            'data' => 'Password Changed Successfully'

        ]);
    }
    public function register(Request $request)
    {

        $credentials =  $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', Password::defaults()],
            // 'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }
        // assign challenges
        $challenges = Challenge::where('status', 1)->where('level', 'beginner')->get();
        foreach ($challenges as $challenge) {
            UserChallenge::create([
                'user_id' => $user->id,
                'challenge_id' => $challenge->id,
                'status' => 1,
                'progress' => 0
            ]);
        }

        return response([
            'status' => 'success',
            'token' => $token,
            'user' => Auth::user()
        ])
            ->header('Authorization', $token);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return 'you loged out';
    }
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }
}
