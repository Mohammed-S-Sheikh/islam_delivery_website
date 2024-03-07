<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vendor' => $this->vendor,
            'vendor_number' => $this->vendor_number,
            'customer_number_1' => $this->customer_number_1,
            'customer_number_2' => $this->customer_number_2,
            'customer_address' => $this->customer_address,
            'total' => $this->total,
            'number_of_items' => $this->number_of_items,
            'city' => CityResource::make($this->city),
            'delegate' => DelegateResource::make($this->delegate),
            'state' => StateResource::make($this->state),
            'notes' => $this->notes,
        ];
    }
}
