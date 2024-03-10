<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuctionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "current_price" => $this->current_price,
            "current_winner_id" => $this->current_winner_id,
            "current_winner" => new UserResource($this->current_winner),
            "no_jumper_limit" => $this->no_jumper_limit,
            "start_time" => $this->start_time,
            "timer" => $this->timer,
            "min_price" => $this->min_price,
            "status" => $this->status,
            "final_winner_id" => $this->final_winner_id,
            "bookmarks" => new BookMarkResource($this->bookmarks),
            "created_at" => $this->created_at,
            "product" => new ProductResource($this->product),

            "bidding_queues" => new BiddingQueueResource($this->next_bidding_queue),
            // 'posts' => PostResource::collection($this->whenLoaded('posts')),

        ];
    }
}
