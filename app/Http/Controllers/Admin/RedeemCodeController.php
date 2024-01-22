<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RedeemCode;
use Illuminate\Http\Request;

class RedeemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $redeemCodes = RedeemCode::latest()->get();
        return view('admin.redeemCodes.index', compact('redeemCodes'));
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
            "description" => "required",
            "code" => "required",
            "value" => "required",
            "use_limit_count" => "required",

        ]);
        RedeemCode::create([

            'description' => $request->description,
            'code' => $request->code,
            'value' => $request->value,
            'use_limit_count' => $request->use_limit_count,
            

        ]);
        return redirect()->back()->with('success', 'ثبت با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(RedeemCode $redeemCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RedeemCode $redeemCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RedeemCode $redeemCode)
    {
        $request->validate([
            "description" => "required",
            "code" => "required",
            "value" => "required",
            "use_limit_count" => "required",

        ]);


        $redeemCode->description = $request->description;
        $redeemCode->code = $request->code;
        $redeemCode->value = $request->value;
        $redeemCode->use_limit_count = $request->use_limit_count;
       

        if ($request->has('status')) {
            $redeemCode->status = 1;
        } else {
            $redeemCode->status = 0;
        }
        $redeemCode->save();

        return redirect()->back()->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RedeemCode $redeemCode)
    {
        $redeemCode->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
