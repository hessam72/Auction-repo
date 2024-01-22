<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Product;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auctions = Auction::latest()->get();

        // dd($auctions);


        return view('admin.auctions.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('title')->get();
        return view('admin.auctions.create',  compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            "product_id" => "required",
            "no_jumper_limit" => "required",
            "min_price" => "required",
            "start_time" => "required|date|after:today",

        ]);
        Auction::create([

            'product_id' => $request->product_id,
            'no_jumper_limit' => $request->no_jumper_limit,
            'min_price' => $request->min_price,
            'start_time' => $request->start_time,
            'current_price' => 0,


        ]);
        return redirect()->to('admin/auctions')->with('success', 'ثبت حراجی با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auction $auction)
    {
        $request->validate([
            "no_jumper_limit" => "required",
            "min_price" => "required",
            "start_time" => "required|date|after:today",

        ]);


        $auction->no_jumper_limit = $request->no_jumper_limit;
        $auction->min_price = $request->min_price;
        $auction->start_time = $request->start_time;


        if ($request->has('status')) {
            $auction->status = 1;
        } else {
            $auction->status = 0;
        }
        $auction->save();

        return redirect()->back()->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
