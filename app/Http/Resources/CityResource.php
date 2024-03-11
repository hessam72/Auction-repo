<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    
        return parent::toArray($request);

        


        // return [
        //     "id"=> $this->id,
        //     "state_id"=> $this->state_id,
        //     "name"=>$this->name,
           
        //     'state' => new StateResource($this->whenLoaded('state')),
        
        
        // ];
    }
}
