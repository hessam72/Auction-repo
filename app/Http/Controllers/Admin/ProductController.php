<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('title')->get();
        $products = Product::latest()->get();
        return view('admin.products.index', compact(['categories', 'products']));
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('title')->get();
        return view('admin.products.edit', compact(['product', 'categories']));
    }

    public function saveRichText(Request $request)
    {
        // return 'fff?ff';


        $product = Product::find($request->product_id);
        $product->description = $request->data;
        $product->save();
        return $product;
    }

    public function getRichText(Request $request)
    {



        $product = Product::find($request->product_id);

        return $product->description;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "title" => "required",

            "category_id" => "required",
            "short_desc" => "required",
            "discount" => "required",
            "inventory" => "required",
        ]);
        $product->title=$request->title;
        $product->category_id=$request->category_id;
        $product->short_desc=$request->short_desc;
        $product->discount=$request->discount;
        $product->title=$request->title;
        $product->product_inventory = $request->inventory;
        $product->save();
        return redirect()->back()->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
