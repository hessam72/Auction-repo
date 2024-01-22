<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidPackage;
use App\Models\Product;
use App\Traits\Upload;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Upload;
    public function index()
    {
        // $categories = Category::orderBy('title')->get();
        $specialOffers = SpecialOffer::latest()->get();

        return view('admin.SpecialOffers.index', compact(['specialOffers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('title')->get();
        $bidPakcages = BidPackage::orderBy('bid_amount')->get();
        return view('admin.SpecialOffers.create',  compact(['products', 'bidPakcages']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->banner);
        $request->validate([

            "type" =>  "required",
            // "item_id" => "required",
            "description" => "required",
            "discount_amount" => "required",
            "expiration_date" =>  "required|date|after:today",
        ]);

        // banner - status - type desc



        if ($request->has('banner')) {

            $path = $this->UploadFile($request->banner, 'images/special_offers_banner'); //use the method in the trait


        } else {
            $path = null;
        }



        if ($request->has('status')) {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($request->type === "1") {
            //bidpackage
            $temp = BidPackage::find($request->bid_item_id);
            $type_desc = $temp->bid_amount;

            $item_id = $request->bid_item_id;
        } elseif ($request->type === "2") {
            // product
            $temp = Product::find($request->product_item_id);
            $type_desc = $temp->title;

            $item_id = $request->product_item_id;
        }



        $specialOffer = SpecialOffer::create([
            "type" => $request->type,
            "item_id" => $item_id,
            "description" => $request->description,
            "discount_amount" => $request->discount_amount,
            "expiration_date" => $request->expiration_date,
            "banner" => $path,
            "status" => $status,
            "type_desc" => $type_desc,

        ]);

        return redirect()->to('admin/specialOffers')->with('success', 'ثبت با موفقیت ثبت شد');

    }

    /**
     * Display the specified resource.
     */
    public function show(SpecialOffer $specialOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpecialOffer $specialOffer)
    {
        //  $categories = Category::orderBy('title')->get();
        // return view('admin.SpecialOffers.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpecialOffer $specialOffer)
    {
        // dd($request->all());
        $request->validate([
            "description" => "required",
            "discount" => "required",
            "expiration_date" => "required|date|after:today",
        ]);
        if ($request->has('banner')) {

            $path = $this->UploadFile($request->banner, 'images/special_offers_banner'); //use the method in the trait
            $specialOffer->banner = $path;
        }


        $specialOffer->description = $request->description;
        $specialOffer->discount_amount = $request->discount;
        $specialOffer->expiration_date = $request->expiration_date;


        if ($request->has('status')) {
            $specialOffer->status = 1;
        } else {
            $specialOffer->status = 0;
        }
        $specialOffer->save();

        return redirect()->back()->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpecialOffer $specialOffer)
    {
        $specialOffer->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
