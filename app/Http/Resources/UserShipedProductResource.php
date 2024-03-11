<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShipedProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return [
        //     'id' => $this->id,
        //     'user_id' => $this->user_id,
        //     'status' => $this->status,
        //     'price' => $this->price,
        //     'address' => $this->address,
        //     'postal_code' => $this->postal_code,
        //     // 'product' => new ProductResource('product'),
        //     // 'city' => new CityResource('city'),
        //     'created_at' => $this->created_at,

        // ];
        return parent::toArray($request);

    }
}
