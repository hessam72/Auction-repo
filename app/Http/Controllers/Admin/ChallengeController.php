<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\Reward;
use App\Models\User;
use App\Models\UserChallenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('title')->get();
        $rewards = Reward::latest()->get();
        $challenges = Challenge::latest()->get();
        return view('admin.challenges.index', compact(['categories', 'rewards', 'challenges']));
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
        // dd($request->all());
        $request->validate([
            'description' => 'required',
            'category_id' => 'required',
            'reward_id' => 'required',
            'number_to_win' => 'required',
            'type' => 'required',
            'day_type' => 'required',
        ]);
        $challenge = Challenge::create([

            'description' => $request->description,
            'category_id' => $request->category_id,
            'reward_id' => $request->reward_id,
            'number_to_win' => $request->number_to_win,
            'type' => $request->type,
            'time_type' => $request->day_type,

        ]);

        // start challenge for users
        $users = User::where('status', 1)->get();
        foreach ($users as $user) {
            UserChallenge::create([
                'user_id' => $user->id,
                'challenge_id' => $challenge->id,
                'status' => 1,
                'progress' => 0
            ]);
        }

        return redirect()->back()->with('success', 'ثبت و تخصیص چالش با موفقیت انجام شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        // dd($request->all());
        $request->validate([
            'description' => 'required',
            'category_id' => 'required',
            'reward_id' => 'required',
            'number_to_win' => 'required',
            'type' => 'required',
            'day_type' => 'required',
        ]);


        $challenge->description = $request->description;
        $challenge->category_id = $request->category_id;
        $challenge->reward_id = $request->reward_id;
        $challenge->number_to_win = $request->number_to_win;
        $challenge->type = $request->type;
        $challenge->time_type = $request->day_type;

        if ($request->has('status')) {
            $challenge->status = 1;
        } else {
            $challenge->status = 0;
        }
        $challenge->save();

        return redirect()->back()->with('success', 'ثبت با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        $challenge->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
