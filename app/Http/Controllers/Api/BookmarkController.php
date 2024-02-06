<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookMarkResource;
use App\Models\Bookmark;
use Illuminate\Http\Request;

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
        $request->validate([
            'user_id' =>  'required',
        ]);

        $data = Bookmark::where('user_id', $request->user_id)->get();

        return BookMarkResource::collection($data);
    }
}
