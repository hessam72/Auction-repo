<?php

namespace App\Http\Controllers\Public\Api;

use App\Events\MyEvent;
use App\Events\TestEvent;
use App\Events\UpdateAuctionState;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use App\Models\Product;
use App\Traits\Upload;
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
        $count = 10;
         if($request->has('per_page')){
           $count = $request->per_page;
         }


        return AuctionResource::collection(Auction::paginate($count));
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
        $data = json_decode($request->getContent());
        // category_id
        $category_id = $data->filter_id;

        $products = Product::filterByCategory($category_id)->get();
        $auction_ids = [];
        foreach ($products as $product) {
            foreach ($product->auctions as $auction) {
                // retrive id
                $auction_ids[] = $auction->id;
            }
        }

        $result = Auction::whereIn('id', $auction_ids)->get();

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
