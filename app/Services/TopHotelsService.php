<?php

namespace App\Services;

use App\Contracts\TopHotelsInterface;
use GuzzleHttp\Client;

class TopHotelsService implements TopHotelsInterface
{
    protected $apiEndpoint = 'http://apigeteway.test/api/';
    public function getHotels(): array {
        $client = new Client();
        $response = $client->get($this->apiEndpoint . 'top-hotels');
        $data = json_decode($response->getBody()->getContents(), true);
        return $this->formatResponse($data);
    }

    public function formatResponse($data): array
    {
        $formatResponse = [];
        foreach ($data['data'] as $hotel) {
            $formatResponse[] = [
                'provider' => $hotel['Provider'],
                'hotelName' => $hotel['Hotel Name'],
                'rate' => $hotel['Rate'],
                'price' => $hotel['Price'],
                'discount' => $hotel['Discount'],
                'roomAmenities' => explode(',', $hotel['Room Amenities']),
            ];
        }
        return $formatResponse;
    }
}
