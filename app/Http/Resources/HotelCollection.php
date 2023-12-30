<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Provider' => $this['provider'],
            'Hotel Name' => $this['hotelName'],
            'Rate' => $this['rate'],
            'Price' => $this['price'] ?? null,
            'Hotel Fare' => $this['hotelFare'] ?? null,
            'Discount' => $this['discount'] ?? null,
            'Room Amenities' => $this['roomAmenities'] ?? null,
        ];
    }
}
