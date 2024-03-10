<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "email" => $this->email,
            "birth_date" => $this->birth_date,
            "bio" => $this->bio,
            "profile_pic" => $this->profile_pic,
            "bid_amount" => $this->bid_amount,
            'bookmarks'=>new BookMarkResource($this->bookmarks),
            'bidding_histories'=>new BiddingHistoryResource($this->bidding_histories),


           
            
        ];
    }
}
