<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookMarkResource;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function storeBookmark(Request $request)
    {
        $request->validate([

            'auction_id' =>  'required',
            'user_id' =>  'required',

        ]);

        $data = Bookmark::firstOrCreate([
            'auction_id' =>  $request->auction_id,
            'user_id' =>  $request->user_id,
        ]);

        if ($data->wasRecentlyCreated) {
            // "firstOrCreate" didn't find the user in the DB, so it created it.
            return response()->json([
                'success' => 'bookmark added',

            ], 200);
        } else {
            // "firstOrCreate" found the user in the DB and fetched it.
            return response()->json([
                'success' => 'you allready bookmark this',

            ], 403);
        }
    }
    public function toggleBookmark(Request $request)
    {

        $request->validate([

            'auction_id' =>  'required',

        ]);

        //check if user allready bookmarked auction
        $is_bookmarked = Bookmark::where('user_id', Auth::user()->id)->where('auction_id', $request->auction_id)->first();
        if ($is_bookmarked === null) {
            //create new bookmark
            Bookmark::create([
                'auction_id' =>  $request->auction_id,
                'user_id' =>  Auth::user()->id,
            ]);
            return response()->json([
                'success' => 'bookmark created',

            ], 200);
        } else {
            // remove bookmark
            Bookmark::where('auction_id', $request->auction_id)->where('user_id', Auth::user()->id)->delete();
            return response()->json([
                'success' => 'bookmark deleted',

            ], 200);
        }
    }
    public function destroyBookmark(Request $request)
    {
        $request->validate([

            'auction_id' =>  'required',
            'user_id' =>  'required',

        ]);

        $data = Bookmark::where('auction_id', $request->auction_id)->where('user_id', $request->user_id)->delete();


        if ($data) {
            // "firstOrCreate" didn't find the user in the DB, so it created it.
            return response()->json([
                'success' => 'bookmark deleted',

            ], 200);
        } else {
            // "firstOrCreate" found the user in the DB and fetched it.
            return response()->json([
                'success' => 'no bookmark found',

            ], 403);
        }
    }
    public function userBookmark(Request $request)
    {


        $data = Bookmark::where('user_id', Auth::user()->id)->get();

        return BookMarkResource::collection($data->load('auction.product'));
    }
}
