<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Traits\Upload;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Upload;
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile.edit-profile', compact('user'));
    }



    public function updatePassword(Request $request, User $user)
    {

        $request->validate([
            'currentPassword' => ['required'],
            'password' => ['required', 'confirmed'],

        ]);



        if (!Hash::check($request->currentPassword, $user->password)) {

            return back()->withErrors([
                'message' => 'لطفا پسورد قبلی خود را درست وارد کنید',

            ]);
        }



        $user->password = Hash::make($request->password);
        $user->save();


        return redirect()->back()->with('success', 'تغییر رمز عبور با موفقیت انجام شد');
    }

    public function updatePasswordIndex()
    {
        $user = auth()->user();
        return view('admin.profile.edit-password', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = auth()->user();


        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'pic' => ['file']

        ]);



        if ($request->hasFile('pic')) {
            $path = $this->UploadFile($request->file('pic'), 'images/user_profiles'); //use the method in the trait
            $user->profile_pic = $path;
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'ویرایش اطلاعات کاربری انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
