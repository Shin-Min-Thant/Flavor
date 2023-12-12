<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class salePreorderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'customer_id'=>$this->customer_id,
            'preorder_number'=>$this->preorder_number,
            'status'=>$this->status,
            'user_id'=>$this->user_id,
            'permit_status'=>$this->permit_status,
        ];
    }
}
