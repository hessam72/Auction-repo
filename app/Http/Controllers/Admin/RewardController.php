<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewards = Reward::latest()->get();
        return view('admin.rewards.index', compact('rewards'));
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
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);
        Reward::create([
            'name' => $request->name,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);
        return redirect()->back()->with('success', 'ثبت با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reward $reward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);
        $reward->name = $request->name;
        $reward->type = $request->type;
        $reward->amount = $request->amount;
        $reward->save();
        return redirect()->back()->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
