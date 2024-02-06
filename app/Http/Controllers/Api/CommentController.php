<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function auctionComments(Request $request)
    {

        $request->validate([
            'product_id' =>  'required',
        ]);

        $data = Comment::where('product_id', $request->product_id)->latest()->get();
        return new CommentResource($data);
    }

    public function storeComment(Request $request)
    {

        $request->validate([
            'product_id' =>  'required',
            'user_id' =>  'required',
            'title' =>  'required',
            'socre' =>  'required',
            'content' =>  'required',
           
        ]);
      
        $data = Comment::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'socre' => $request->socre,
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => 'winner added successfully',

        ], 200);
      
    }
}
