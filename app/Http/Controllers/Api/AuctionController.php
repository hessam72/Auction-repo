<?php

namespace App\Http\Controllers\Api;

use App\Events\MyEvent;
use App\Events\TestEvent;
use App\Events\UpdateAuctionState;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use App\Models\Product;
use App\Traits\Upload;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Upload;
    public function index(Request $request)
    {
        $skip = 0;
        $take = 10;
        if ($request->has('skip') && $request->has('take')) {
            $skip = $request->skip;
            $take = $request->take;
        }


        return AuctionResource::collection(Auction::skip($skip)->take($take)->get());
        // return AuctionResource::collection(Auction::paginate($count)->load('product'));
        // $data = Auction::paginate($count)->load('product');
        // return ['all' => AuctionResource::collection($data)->response()->getData(true) ,
        //  'paginate'=>Auction::paginate($count)];
    }

    public function search(Request $request)
    {
        // return $request->search;
        // $request->validate([
        //     'search' =>  'required',
        // ]);
        $data = json_decode($request->getContent());
        $searchString = $data->search;

        $result = Auction::search($searchString)->paginate();
        return AuctionResource::collection($result->load('product'));
    }


    public function filter(Request $request)
    {

        // category_id

        // sort_by
        // min_price
        // max_price

        $category_id = $request->category_id;


        //sort by 
        // latest
        // most_popular
        // live
        // starting_soon
        $auctionOrderBy = "created_at";
        $productOrderBy = "created_at";
        $live_only = false;
        $soon_only = false;
        switch ($request->sort_by) {
            case "latest":
                //auction created at

                break;
            case "most_popular":
                //order by product sales count
                $productOrderBy = "sales_count";
                break;
            case "live":
                // auction start_time < now
                $live_only = true;
                break;
            case "starting_soon":
                // auction start_time > now
                //    sort by start_time
                $soon_only = true;
                break;
        }


        if ($category_id === null) {
            $products = Product::orderBy($productOrderBy)->get();
        } else {
            $products = Product::orderBy($productOrderBy)->filterByCategory($category_id)->get();
        }


        //filter by min and max price 
        $filter_price_products = [];

        foreach ($products as $product) {

            if ($product->price >= (int)$request->min && $product->price <= (int)$request->max) {
                $filter_price_products[] = $product;
            }
        }

        $auction_ids = [];
        foreach ($filter_price_products as $product) {
            foreach ($product->auctions as $auction) {
                // retrive id
                $auction_ids[] = $auction->id;
            }
        }

        if ($live_only) {
            //filter live auctions only
            $result = Auction::whereIn('id', $auction_ids)->where('start_time', '<', Carbon::now())
            ->orderBy($auctionOrderBy)->get();
        } elseif ($soon_only) {
            //filter starting soon auctions
            $result = Auction::whereIn('id', $auction_ids)->where('start_time', '>', Carbon::now())
            ->orderBy($auctionOrderBy)->get();
        } else {
            $result = Auction::whereIn('id', $auction_ids)->orderBy($auctionOrderBy)->get();
        }

        return AuctionResource::collection($result->load('product'));
    }






    public function test_pusher()
    {


        $data = array("id" => 35, "message" => "it's working", "idd" => 35, "messdage" => "it's working", "iwdd" => 35, "mfessage" => "it's working", "ird" => 35, "messbage" => "it's working", "i2d" => 35, "mess6age" => "it's working", "i6d" => 35, "me3ssage" => "it's working", "ipd" => 35, "mpessage" => "it's working", "pid" => 35, "messagpe" => "it's working", "i3278d" => 35, "messapge" => "it's working", "i78d" => 35, "mes78sage" => "it's working", "78id" => 35, "78message" => "it's working", "id78" => 35, "message78" => "it's working");
        echo json_encode($data);


        // event(new MyEvent($data));
        // broadcast(new MyEvent($data));
        broadcast(new MyEvent($data))->toOthers();
        // broadcast(new UpdateAuctionState($data))->toOthers();


        return 'pusher sent';
    }




    // upload image
    public function test(Request $request)
    {

        $request->validate([
            'image' =>  'required|mimes:jpeg,png,doc,docs,pdf',
        ]);



        $path = $this->UploadFile($request->file('image'), 'images/test_repo'); //use the method in the trait
        return 'done';


        $file = $request->file('image');
        // $file = $request->file_name;
        return 88;
    }

    /**
     * Show the form for creating a new resource.
     */


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
    public function show(Auction $auction)
    {
        return new AuctionResource($auction->load('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auction $auction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
