<?php

namespace App\Http\Resources;

use App\Models\UserShipedProduct;
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
            'bookmarks' =>  BookMarkResource::collection($this->whenLoaded('bookmarks')),
            'bidding_histories' => new BiddingHistoryResource($this->whenLoaded('bidding_histories')),
            'tickets' => new TicketResource($this->whenLoaded('tickets')),
            'transactions' => new TransactionResource($this->whenLoaded('transactions')),
            'challenges' => new ChallengeResource($this->whenLoaded('challenges')),
            'redeem_codes' => new RedeemCodeResource($this->whenLoaded('redeem_codes')),
            'highest_bidders' => new HighestBidderResource($this->whenLoaded('highest_bidders')),
            // 'user_shiped_products'=>new UserShipedProduct($this->whenLoaded('user_shiped_products')),
            'winners' => new WinnerResource($this->whenLoaded('winners')),
            'city' => new CityResource($this->city),




            // 'posts' => PostResource::collection($this->whenLoaded('posts')),




        ];
    }
}
