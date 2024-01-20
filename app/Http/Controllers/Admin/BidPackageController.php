<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidPackage;
use Illuminate\Http\Request;

class BidPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidPackages = BidPackage::latest()->get();
        return view('admin.bidPackages.index', compact('bidPackages'));
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
            'bid_amount' => 'numeric|required',
            'price' => 'numeric|required',
            'discount' => 'numeric|required',
        ]);
        BidPackage::create([
            'bid_amount' => $request->bid_amount,
            'price' => $request->price,
            'discount' => $request->discount
        ]);
        return redirect()->back()->with('success', 'ثبت با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(BidPackage $bidPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidPackage $bidPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidPackage $bidPackage)
    {
        $request->validate([
            'bid_amount' => 'numeric|required',
            'price' => 'numeric|required',
            'discount' => 'numeric|required',
        ]);
        $bidPackage->bid_amount = $request->bid_amount;
        $bidPackage->price = $request->price;
        $bidPackage->discount = $request->discount;
        $bidPackage->save();
        return redirect()->back()->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(BidPackage $bidPackage)
    {
        $bidPackage->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
