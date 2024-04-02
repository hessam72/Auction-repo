<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserShipedProduct;
use Illuminate\Http\Request;

class ShippedProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = UserShipedProduct::latest()->with(['user' , 'product'])->get();
        return view('admin.shippedProducts.index', compact('products'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //save posted product status
    public function update(Request $request, string $id)
    {
        UserShipedProduct::where('id' , $id)->update([
            'status' => 200 //shipped
        ]);
        
        return redirect()->back()->with('success', 'ثبت ارسال کالا با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
