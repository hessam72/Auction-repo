<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Temprary;
use Illuminate\Http\Request;
use App\Traits\Upload;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Upload;

    public function index()
    {
        // return view('test');
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
        // dd($request->all());
        // dd($request->has('product_imgs'));



        $request->validate([
            "title" => "required",
            "price" => "required",

            "category_id" => "required",
            "short_desc" => "required",
            "discount" => "required",
            "inventory" => "required",
            "temp_id" => "required",
        ]);

        $temp_desc = Temprary::find($request->temp_id);

        $product = Product::create([
            "title" => $request->title,
            "price" => $request->price,
            "category_id" => $request->category_id,
            "short_desc" => $request->short_desc,
            "discount" => $request->discount,
            "inventory" => $request->product_inventory,
            "description" => $temp_desc->val
        ]);
        if ($request->has('product_imgs')) {
            if ($request->product_imgs[0]['file']) {
                foreach ($request->product_imgs as $image) {
                    $path = $this->UploadFile($image['file'], 'images/product_images'); //use the method in the trait
                    ProductGallery::create([
                        'image' => $path,
                        'product_id' => $product->id
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'ثبت با موفقیت ثبت شد');
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
        if (!empty($request->product_id)) {
            //update query
            $product = Product::find($request->product_id);

            $product->description = $request->data;
            $product->save();
            return $product;
        } else {

            $temp = Temprary::create([]);
            $temp->val = $request->data;
            $temp->save();

            return $temp->id;
        }
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
            "price" => "required",

            "category_id" => "required",
            "short_desc" => "required",
            "discount" => "required",
            "inventory" => "required",
        ]);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->short_desc = $request->short_desc;
        $product->discount = $request->discount;
        $product->title = $request->title;
        $product->product_inventory = $request->inventory;
        $product->save();


        //managing images
        if ($request->has('product_imgs')) {
            if ($request->product_imgs[0]['file']) {
                //delete old images
               
                $product->product_galleries()->each(function($pg) {
                    $pg->delete(); 
                });
                // store new images
                foreach ($request->product_imgs as $image) {
                    $path = $this->UploadFile($image['file'], 'images/product_images'); //use the method in the trait
                    ProductGallery::create([
                        'image' => $path,
                        'product_id' => $product->id
                    ]);
                }
            }
        }


        return redirect()->to('admin/products')->with('success', 'ویرایش با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'حذف با موفقیت ثبت شد');
    }
}
