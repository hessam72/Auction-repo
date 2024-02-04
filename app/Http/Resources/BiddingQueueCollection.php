<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BiddingQueueCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $items = [];

        foreach($this->collection as $item) {
            if($item->status === 1){
                array_push($items, [
                    'id' => $item->id,
                    'bid_buddy_id'=>$item->bid_buddy_id,
                    'auction_id'=>$item->auction_id,
                    'status'=>$item->status,

                ]);
            }
            

        }

        return $items;
    }
}
