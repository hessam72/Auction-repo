<?php

namespace App\Http\Controllers\Api;

use App\Events\MyEvent;
use App\Events\TestEvent;
use App\Events\UpdateAuctionState;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Http\Resources\WinnerResource;
use App\Models\Auction;
use App\Models\BiddingHistory;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Winner;
use App\Traits\Upload;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Upload;

    public function auction_index(Request $request)
    {

        $auction = new AuctionResource(Auction::find($request->id));

        $side_auctions = AuctionResource::collection(Auction::where('start_time', '<', Carbon::now())->take(3)->get());

        $all_participaints = BiddingHistory::where('auction_id', $request->id)->with('user.city')->orderBy('created_at', 'desc')->get();
        // $participaints = BiddingHistory::select('user_id')->groupBy('user_id')->get()->toArray() ;
        $uniq_participaints = [];

        if (count($all_participaints) > 0) {

            // if there was any then:
            $uniq_participaints[] = $all_participaints[0];
            $is_uniqe = 1;
            foreach ($all_participaints as $p) {
                foreach ($uniq_participaints as $uniq_p) {
                    if ($uniq_p->user_id === $p->user_id) {
                        $is_uniqe = 0;
                    }
                }
                if ($is_uniqe) {
                    $uniq_participaints[] = $p;
                }
                $is_uniqe = 1;
            }
        }


        $winners = Winner::where('product_id', $auction->product->id)->with('user')->latest()->get();

        // $comments = Comment::where('product_id', $auction->product->id)->with('user')->orderBy('created_at', 'desc')->get();
        return response([
            'auction' => $auction,
            'side_auctions' => $side_auctions,
            'participaints' => $uniq_participaints,
            'all_participaints' => $all_participaints,
            'winners' => $winners,
            // 'comments' => $comments,


        ]);
    }
    public function auction_comments(Request $request)
    {

        $skip = 0;
        $take = 10;
        if ($request->has('skip') && $request->has('take')) {
            $skip = $request->skip;
            $take = $request->take;
        }


        $comments = Comment::where('product_id', $request->id)->skip($skip)->take($take)->with('user.city')->orderBy('created_at', 'desc')->get();


        $total_count = Comment::where('product_id', $request->id)->count();
        $total_score = Comment::where('product_id', $request->id)->avg('total_socre');


        return response([
            "comments" => $comments,
            "total_count" => $total_count,
            "total_score" => $total_score
        ]);
    }



    public function index(Request $request)
    {
        $skip = 0;
        $take = 10;
        if ($request->has('skip') && $request->has('take')) {
            $skip = $request->skip;
            $take = $request->take;
        }

        // calling from homepage
        if ($request->has('from_home')) {
            $take = 4;
        }

        return AuctionResource::collection(Auction::skip($skip)->take($take)->get());
    }

    public function search(Request $request)
    {
        // return $request->search;
        // $request->validate([
        //     'search' =>  'required',
        // ]);
        $skip = 0;
        $take = 10;
        if ($request->has('skip') && $request->has('take')) {
            $skip = $request->skip;
            $take = $request->take;
        }

        $data = json_decode($request->getContent());
        $searchString = $data->search;

        $result = Auction::search($searchString)->skip($skip)->take($take)->get();
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


        if ($category_id === null || $category_id === 0) {
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



    public function store_comment(Request $request)
    {
        $request->validate([

            'product_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'comment_quality' => 'required',
            'comment_worth_of_money' => 'required',
            'comment_suggest_it' => 'required',
            'comment_packaging' => 'required'
        ]);
       
        $total_score = ($request->comment_quality +
            $request->comment_worth_of_money +
            $request->comment_suggest_it +
            $request->comment_packaging) / 4;

        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'quality' => $request->comment_quality,
            'value_for_price' => $request->comment_worth_of_money,
            'suggest_it' => $request->comment_suggest_it,
            'packaging' => $request->comment_packaging,
            'total_socre'=>$total_score
        ]);
        return response()->json([
            'success' => 'Review Submited Successfully',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
}
