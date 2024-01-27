<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "title" => $this->title,
            "discount" => $this->discount,
            "sales_count" => $this->sales_count,
            "short_desc" => $this->short_desc,
            "description" => $this->description,
            "price" => $this->price,
            "product_inventory" => $this->product_inventory,
           
            "created_at" => $this->created_at,
            "category" => new CategoryResource($this->category),
            "galleries" => new ProductGalleryResource($this->product_galleries),
            
        ];
    }
}
