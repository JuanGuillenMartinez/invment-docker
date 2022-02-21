<?php

namespace App\Http\Resources\Borrow;

use Illuminate\Http\Resources\Json\JsonResource;

class BorrowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => $this->customer,
            'discount' => $this->discount,
            'final_price' => $this->final_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
